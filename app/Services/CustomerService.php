<?php

namespace App\Services;

use App\Models\Caste;
use App\Models\Followup;
use App\Models\Interaction;
use App\Models\Meeting;
use App\Models\ProfileBio;
use App\Models\ProfileBs;
use App\Models\ProfileEducation;
use App\Models\ProfileMoreInfo;
use App\Models\ProfileOrganisation;
use App\Models\ProfilePersonal;
use App\Models\Snap;
use App\Models\ViewProfile;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerService
{

    public function index($request)
    {
        $query = $this->loadData($request);
        return $request->limit ? $query->limit($request->limit)->paginate($request->limit) : $query->get();
    }

    protected function loadData($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        return ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            'education',
            'organisation',
            'payment',
            'profilebs',
            'personal.zone'
        ])::orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno));
    }

    public function pickListBioData($request, $selectArray = ['rno', 'refname'], $single = false)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $limit   = $request->limit ?? 20;

        $query = ProfileBio::select($selectArray)->orderBy($sortBy, $orderBy)
            ->when($request->q, function ($query) use ($request) {
                $query->where('refname', 'like', "%{$request->q}%")
                    ->orWhere('rno', 'like', "%{$request->q}%");
            })
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->refname, fn($query) => $query->where('refname', 'like', "%{$request->refname}%"));

        return $single ? $query->first() : $query->paginate($limit);
    }



    public function saveProfileBio($rno, $data)
    {
        $columns                    = ["gender", "refname", "dob", "tob", "age", "pob", "religion", "caste", "subcaste", "gotra", "hght", "hghtft", "wtkg", "complexion", "dd", "bg", "astrostatus", "drinkinghabit", "smokinghabit", "eatinghabit", "spects", "education", "occupation", "income", "rs", "ms"];
        $filterArray                = Arr::only($data, $columns);
        $filterArray["empid"]       = auth()->user()->username;
        $filterArray["dtype"]       = 'N';
        $filterArray["profiledate"] = now();
        return ProfileBio::updateOrCreate(['rno' => $rno], $filterArray);
    }

    public function saveProfilePersonal($rno, $data)
    {
        $columns     = ["visa", "rcity", "rcountry", "marriageinfo", "child", "childdetails", "familystatus", "fathersname", "mothersname", "fatherdetails", "motherdetails", "familyincome", "familyincomem", "typeoffamily", "familynative", "hobbies", "characteristics", "eyecolor", "haircolor", "salary", "budget", "nationality", "familyhistory", "contactperson", "contactaddress", "contactcity", "contactstate", "contactpincode", "contactcountry", "contactphone", "contactemail", "contactrelation", "personaldetails", "contactzone", "arealocation"];
        $filterArray = Arr::only($data, $columns);
        return ProfilePersonal::updateOrCreate(['rno' => $rno], $filterArray);
    }

    public function saveProfileEducation($rno, $data)
    {
        return DB::transaction(function () use ($rno, $data) {
            ProfileEducation::where('rno', $rno)->delete();
            $course = $data['educourse'];
            $inst   = $data['eduinst'];
            $eyear  = $data['eduyear'];
            $items  = [];
            foreach ($course as $key => $value) {
                $items[] = [
                    'rno'        => $rno,
                    'educourse'  => $value,
                    'eduinst'    => $inst[$key],
                    'eduyear'    => $eyear[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            return ProfileEducation::insert($items);
        });
    }

    public function saveProfileOrganisation($rno, $data)
    {

        return DB::transaction(function () use ($rno, $data) {
            ProfileOrganisation::where('rno', $rno)->delete();
            $orgname = $data['orgname'];
            $orgdept = $data['orgdept'];
            $orgyear = $data['orgyear'];
            $items   = [];
            foreach ($orgname as $key => $value) {
                $items[] = [
                    'rno'        => $rno,
                    'orgname'    => $value,
                    'orgdept'    => $orgdept[$key],
                    'orgyear'    => $orgyear[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            return ProfileOrganisation::insert($items);
        });
    }

    public function saveProfileBS($rno, $data)
    {
        return DB::transaction(function () use ($rno, $data) {
            ProfileBs::where('rno', $rno)->delete();

            $bsname     = $data['bsname'];
            $bs         = $data['bs'];
            $bsage      = $data['bsage'];
            $bsmarriage = $data['bsmarriage'];
            $bsdetails  = $data['bsdetails'];
            $items      = [];
            foreach ($bsname as $key => $value) {
                $items[] = [
                    'rno'        => $rno,
                    'bsname'     => $value,
                    'bs'         => $bs[$key],
                    'bsage'      => $bsage[$key],
                    'bsmarriage' => $bsmarriage[$key],
                    'bsdetails'  => $bsdetails[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            return ProfileBs::insert($items);
        });
    }
    public function saveViewProfile($rno, $data)
    {
        $cst                   = Caste::find($data['caste']);
        $currentUserId         = auth()->user()->username;
        $diff                  = Carbon::parse($data['dob'])->diff(now());
        $columns               = ['refname', 'hghtft', 'rs', 'ms'];
        $filterArray           = Arr::only($data, $columns);
        $filterArray["g"]      = $data['gender'];
        $filterArray["y"]      = $diff->year;
        $filterArray["m"]      = $diff->month;
        $filterArray["rl"]     = $data['religion'];
        $filterArray["cst"]    = $cst->name;
        $filterArray["hg"]     = $data['hght'];
        $filterArray['wt']     = $data['wtkg'];
        $filterArray['eh']     = $data['eatinghabit'];
        $filterArray['ast']    = $data['astrostatus'];
        $filterArray['ed']     = $data['education'];
        $filterArray['oc']     = $data['occupation'];
        $filterArray['pi']     = $data['income'];
        $filterArray['ch']     = $data['child'];
        $filterArray['fi']     = $data['familyincome'];
        $filterArray['tc']     = $currentUserId;
        $filterArray['mc']     = $currentUserId;
        $filterArray['rm']     = $currentUserId;
        $filterArray['p_sent'] = '0';
        $filterArray['dtype']  = 'N';
        $filterArray['status'] = 'A';
        $filterArray['ost']    = '';
        return ViewProfile::updateOrCreate(['rno' => $rno], $filterArray);
    }

    public function getSnaps($rno)
    {
        return Snap::where('rno', $rno)->OrderBy('sorting', 'asc')->get();
    }

    public function storesnap($data)
    {
        return Snap::create($data);
    }

    public function deletesnap($data)
    {
        return Snap::where($data)->delete();
    }

    public function saveProfileMoreInfo($data)
    {
        $data['dated'] = $data['dated'] ?? now()->format('y-m-d');
        $data['time']  = $data['time'] ?? now()->format('h:i:s');
        $data['empid'] = $data['empid'] ?? auth()->user()->username;

        return ProfileMoreInfo::updateOrCreate(['rno' => $data['rno']], $data);
    }

    public function fetchProfileMoreInfo($rno)
    {
        return ProfileMoreInfo::where('rno', $rno)->first();
    }


    public function storeInteraction($data)
    {
        try {
            DB::transaction(function () use ($data) {
                $data['empid'] = auth()->user()->username;
                $result = Interaction::create($data);
                //TODO: update followup future date if needed
                // Followup::where('rno', $data['rno'])->update(['futuredate' => $data['futuredate']]);
            });
            return true;
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            return false;
        }
    }

    public function storeMeeting($data)
    {
        try {
            DB::transaction(function () use ($data) {
                $result = Meeting::create($data);
                ViewProfile::where('rno', $data['rno'])->update(['last_mtng' => $data['dated']]);

                //TODO: update followup future date if needed
                // Followup::where('rno', $data['rno'])->update(['futuredate' => $data['futuredate']]);
            });
            return true;
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            return false;
        }
    }
}
