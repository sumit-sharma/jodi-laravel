<?php

namespace App\Services;

use App\Models\Caste;
use App\Models\Occupation;
use App\Models\SearchLog;
use App\Models\ViewProfile;
use App\Models\Zone;
use Illuminate\Support\Facades\Cache;

class SearchService
{
    public function search(array $input, int $perPage = 20,  int $page = 1)
    {
        $searchField  = $input['searchinfield'];
        $searchValue  = trim($input['searchvalue']);
        $dtype        = $input['dtype'] ?? [];
        $status       = $input['chkstatus'] ?? [];
        $gender       = $input['gender'] ?? '';
        $fromAge      = $input['from_age'] ?? 17;
        $toAge        = $input['to_age'] ?? 70;
        $ast          = $input['ast'] ?? '';
        $arealocation = $input['arealocation'] ?? '';
        $ms           = $input['ms'] ?? '';
        $searchterm  = $input['searchterm'] ?? '';

        $cacheKey = 'search_results_' . md5(json_encode(['searchField' => $searchField, 'searchValue' => $searchValue, 'searchterm' => $searchterm, 'g' => $gender, 'fromAge' => $fromAge, 'toAge' => $toAge, 'ast' => $ast, 'arealocation' => $arealocation, 'ms' => $ms, 'dtype' => $dtype, 'status' => $status, 'page'  => $page, 'perPage' => $perPage]));

        if ($searchField === 'dob') {
            $searchValue = date('Y-m-d', strtotime(str_replace('/', '-', $searchValue)));
        }
        $query = ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            'education',
            'organisation',
            'payment',
            'profilebs',
            'personal.zone'
        ]);
        if (! empty($dtype)) {
            $query = $query->whereIn('dtype', $dtype);

            // OST logic
            if (! in_array('A', $dtype)) {
                $query = $query->where('ost', '!=', 'N');
            }
        }
        if (! empty($status)) {
            $query = $query->whereIn('status', $status);
        }

        switch ($searchField) {

            case 'rno':
                $query->where($searchField, 'like', "$searchValue%");
                break;
            case 'refname':
            case 'cst':
            case 'tc':
            case 'mc':
            case 'rm':
                $query->where($searchField, 'like', "%$searchValue%");
                break;

            case 'contactphone':
            case 'rcity':
            case 'contactemail':
            case 'arealocation':
            case 'fathersname':
            case 'mothersname':
            case 'fatherdetails':
            case 'motherdetails':
            case 'contactcity':
            case 'contactstate':
                $query->whereHas('personal', function ($q) use ($searchField, $searchValue) {
                    $q->where($searchField, 'like', "%$searchValue%");
                });
                break;

            case 'zone':
                $zoneValues = self::get_zonedetail($searchValue);
                $query->whereHas(
                    'personal',
                    fn($q) =>
                    $q->whereIn('contactzone', $zoneValues)
                );
                break;

            case 'familyincome':
                $query->whereHas(
                    'personal',
                    fn($q) =>
                    $q->where('familyincome', $searchValue)
                );
                break;

            case 'edu':
                $query->whereHas('education', function ($q) use ($searchValue) {
                    $q->where('educourse', 'like', "%$searchValue%")
                        ->orWhere('eduinst', 'like', "%$searchValue%");
                });
                break;

            case 'occu':
                $query->whereHas('organisation', function ($q) use ($searchValue) {
                    $q->where('orgname', 'like', "%$searchValue%")
                        ->orWhere('orgdept', 'like', "%$searchValue%");
                });
                break;

            case 'dob':
                $query->whereHas(
                    'bio',
                    fn($q) =>
                    $q->where('dob', $searchValue)
                );
                break;

            case 'birthyear':
                $query->whereHas(
                    'bio',
                    fn($q) =>
                    $q->whereYear('dob', $searchValue)
                );
                break;

            case 'occupation':
                $occList = self::get_occdetail($searchValue);
                $query->whereIn('oc', $occList);
                break;
        }
        if (isset($input['gender']) && $input['gender'] != '') {
            $query =  $query->when($input['gender'], fn($q) => $q->where('g', $input['gender']));
        }

        if (isset($input['from_age']) && $input['from_age'] != '') {
            // $query =  $query->when($input['from_age'], fn($q) => $q->where('age', '>=', $input['from_age']));
            $query->whereHas(
                'bio',
                fn($q) =>
                $q->where('dob', '<=', now()->subYears($fromAge + 1)->addDay())
            );
        }
        if (isset($input['to_age']) && $input['to_age'] != '') {
            $query->whereHas(
                'bio',
                fn($q) =>
                $q->where('dob', '>=', now()->subYears($toAge + 1)->addDay())
            );
        }

        if (isset($input['ast']) && $input['ast'] != '') {
            $query =  $query->when($input['ast'], fn($q) => $q->where('ast', $input['ast']));
        }

        if (isset($input['arealocation']) && $input['arealocation'] != '') {
            // $query =  $query->when($input['arealocation'], fn($q) => $q->where('ast', $input['ast']));
            $query->whereHas(
                'personal',
                fn($q) =>
                $q->where('arealocation', 'like', "%{$input['arealocation']}%")
            );
        }

        if (isset($input['ms']) && $input['ms'] != '') {
            $query =  $query->when($input['ms'], fn($q) => $q->where('ms', $input['ms']));
        }

        if (isset($input['searchterm']) && $input['searchterm'] != '') {
            $query =  $query->when($input['searchterm'], fn($q) => $q->where('refname', 'like', "%{$input['searchterm']}%"));
        }

        // Sort latest profiles first
        $query->orderByDesc('id');

        $resultData = Cache::remember($cacheKey, now()->addMinutes(30), function () use ($query, $perPage, $page) {
            // Return paginated result
            return $query->paginate($perPage, ['*'], 'page', $page)->withQueryString();
        });

        return ['resultData' => $resultData, 'cacheKey' => $cacheKey];
    }

    public static function get_zonedetail($searchValue)
    {
        $zone = Zone::where('zone_name', $searchValue)->get();
        return $zone->pluck('zone_code ')->toArray();
    }

    public static function get_occdetail($searchValue)
    {
        $occuption = Occupation::where('name', $searchValue)->get();
        return $occuption->pluck('occ_code')->toArray();
    }

    public function saveSearchLog($input)
    {
        $searchField = $input['searchinfield'];
        $searchValue = trim($input['searchvalue']);
        $dtype       = $input['dtype'] ?? [];
        $status      = $input['chkstatus'] ?? [];

        return SearchLog::create([
            'searchvalue' => $searchValue,
            'inputs'      => ['searchinfield' => $searchField, 'searchvalue' => $searchValue, 'dtype' => $dtype, 'status' => $status],
            'empid' => auth()->user()->username,
        ]);
    }


    public function getSearchLog($perPage = 5, $page = 1, $empid = null)
    {
        $query = SearchLog::with('employee');
        if ($empid) {
            $query = $query->where('empid', $empid);
        }
        return $query->latest()->paginate($perPage, ['*'], 'page', $page);
    }


    public function searchByrno($rno, $with = [
        'personal',
        'bio',
        'occupation',
        'income',
        'education',
        'organisation',
        'payment',
        'profilebs',
        'personal.zone',
        'snaps'
    ])
    {
        $query = ViewProfile::with($with);

        return $query->where('rno', $rno)->first();
    }
}
