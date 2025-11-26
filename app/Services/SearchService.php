<?php
namespace App\Services;

use App\Models\Occupation;
use App\Models\SearchLog;
use App\Models\ViewProfile;
use App\Models\Zone;
use Illuminate\Support\Facades\Cache;

class SearchService
{
    public function search(array $input, int $perPage = 20)
    {
        $searchField = $input['searchinfield'];
        $searchValue = trim($input['searchvalue']);
        $dtype       = $input['dtype'] ?? [];
        $status      = $input['chkstatus'] ?? [];

        $cacheKey = 'search_results_' . md5(json_encode(['searchField' => $searchField, 'searchValue' => $searchValue, 'dtype' => $dtype, 'status' => $status]));

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
                $query->whereHas('personal', fn($q) =>
                    $q->whereIn('contactzone', $zoneValues)
                );
                break;

            case 'familyincome':
                $query->whereHas('personal', fn($q) =>
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
                $query->whereHas('bio', fn($q) =>
                    $q->where('dob', $searchValue)
                );
                break;

            case 'birthyear':
                $query->whereHas('bio', fn($q) =>
                    $q->whereYear('dob', $searchValue)
                );
                break;

            case 'occupation':
                $occList = self::get_occdetail($searchValue);
                $query->whereIn('oc', $occList);
                break;
        }

        // Sort latest profiles first
        $query->orderByDesc('id');

        return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($query, $perPage) {
            // Return paginated result
            return $query->paginate($perPage)->withQueryString();
        });
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
            'empid' => auth()->user()->id,
        ]);
    }

    public function searchByrno($rno)
    {
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

        return $query->where('rno', $rno)->first();
    }

}
