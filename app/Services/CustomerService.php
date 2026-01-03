<?php

namespace App\Services;

use App\Models\Caste;
use App\Models\Enquiry;
use App\Models\Feedback;
use App\Models\FixMember;
use App\Models\Followup;
use App\Models\HoldMember;
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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CustomerService
{

    public function index($request)
    {
        $query = $this->loadData($request);
        return $request->limit ? $query->paginate($request->limit) : $query->get();
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
                    'bsage'      => $bsage[$key] ?? 0,
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

    public function getMeetings($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = Meeting::orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno));
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function getInteractions($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = Interaction::orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno));
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function toggleBookmarkInteraction($interactionId)
    {
        $interaction = Interaction::find($interactionId);
        $interaction->status = $interaction->status == '2' ? '0' : '2';
        $interaction->save();
        $interaction->refresh();
        return $interaction;
    }

    public function destroyInteraction($interactionId)
    {
        Interaction::find($interactionId)->delete();
        return true;
    }

    public function storeEnquiry($data)
    {
        return Enquiry::create($data);
    }

    public function getEnquiry($rno)
    {
        return Enquiry::where('rno', $rno)->latest('id')->first();
    }

    public function getEnquiryList($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = Enquiry::orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno));
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }


    public function getFeedbackList($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = Feedback::orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno));

        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function getFeedbackListByType($type, $request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $cacheKey = $request->rno . '_' . $type . '_' . $orderBy . '_' . $sortBy . '_' . $request->limit . '_' . $request->page;

        return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($type, $request, $orderBy, $sortBy) {
            if ($type == "rno") {
                $with = ['receiver'];
            } elseif ($type == "proposal") {
                $with = ['sender'];
            }
            $query = Feedback::with($with)->orderBy($sortBy, $orderBy)
                ->when($request->rno, fn($query) => $query->where($type, $request->rno));


            return $request->limit ? $query->paginate($request->limit) : $query->get();
        });
    }

    public function storeFixMember($data)
    {
        $data['dated'] = $data['dated'] ?? now()->format('y-m-d');
        $data['time']  = $data['time'] ?? now()->format('h:i:s');
        // $data['empid'] = $data['empid'] ?? auth()->user()->username;
        return FixMember::create($data);
    }

    public function checkHoldMember($rno)
    {
        $query = ViewProfile::where('rno', $rno)
            ->where('ost', 'F')
            ->whereNotIn('rno', function ($query) {
                $query->select('rno')->from('followup');
            })
            //TODO: add prespective filter if needed
            // ->whereNotIn('rno', function ($query) {
            //     $query->select('rno')->from('prospective');
            // })
            ->count();
        return $query;
    }


    public function checkEligibleFixMember($rno)
    {
        return FixMember::where('rno', $rno)->where('status', '<', 2)->count();
    }

    public function getFixMembers($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = FixMember::orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno));
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function setFixMember($rno)
    {
        return DB::transaction(function () use ($rno) {
            FixMember::where('rno', $rno)
                ->update([
                    'status' => 2,
                    'update_by' => auth()->user()->username,
                    'update_date' => now()->format('Y-m-d'),
                    'update_time' => now()->format('H:i:s')
                ]);
            ViewProfile::where('rno', $rno)
                ->whereIn('rno', function ($query) {
                    $query->select('rno')->from('fix_member');
                })
                ->update([
                    'ost' => '',
                    'status' => 'F',
                ]);
            Followup::where('rno', $rno)
                ->whereIn('rno', function ($query) {
                    $query->select('rno')->from('fix_member');
                })
                ->delete();
            //TODO: delete prospective table data if available
            return true;
        });
    }

    public function setActiveMember($rno)
    {
        return DB::transaction(function () use ($rno) {
            FixMember::where('rno', $rno)
                ->update([
                    'status' => 3,
                    'update_by' => auth()->user()->username,
                    'update_date' => now()->format('Y-m-d'),
                    'update_time' => now()->format('H:i:s')
                ]);
            ViewProfile::where('rno', $rno)
                ->whereIn('rno', function ($query) {
                    $query->select('rno')->from('fix_member');
                })
                ->update([
                    'status' => 'A',
                ]);

            return true;
        });
    }

    public function deleteFixMember($rno)
    {
        return DB::transaction(function () use ($rno) {
            FixMember::where('rno', $rno)
                ->update([
                    'status' => 4,
                    'update_by' => auth()->user()->username,
                    'update_date' => now()->format('Y-m-d'),
                    'update_time' => now()->format('H:i:s')
                ]);
            return true;
        });
    }

    public function toggleHoldReleaseMember($data)
    {
        return DB::transaction(function () use ($data) {
            $ost = $data['status'] == 0 ? 'F' : '';
            HoldMember::create([
                'rno'         => $data['rno'],
                'hold_req_by' => auth()->user()->username,
                'hold_by'     => $data['hold_by'],
                'dated'       => $data['dated'] ?? now()->format('Y-m-d'),
                'time'        => $data['time'] ?? now()->format('H:i:s'),
                'reason'      => $data['reason'],
                'status'      => $data['status']
            ]);

            ViewProfile::where('rno', $data['rno'])
                ->update(['ost' => $ost]);
            return true;
        });
    }

    public function getHoldMembers($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = HoldMember::with('viewProfile')->orderBy($sortBy, $orderBy)
            ->whereHas('viewProfile', fn($query) => $query->where('ost', 'F'))
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno));
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }
}
