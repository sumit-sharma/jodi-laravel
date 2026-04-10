<?php

namespace App\Services;

use App\Models\BsLog;
use App\Models\Caste;
use App\Models\Classified;
use App\Models\CounterNumber;
use App\Models\DeleteLog;
use App\Models\EduLog;
use App\Models\Enquiry;
use App\Models\Feedback;
use App\Models\FixMember;
use App\Models\Followup;
use App\Models\HoldMember;
use App\Models\Interaction;
use App\Models\Meeting;
use App\Models\OrgLog;
use App\Models\ProfileBio;
use App\Models\ProfileBs;
use App\Models\ProfileDetail;
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
                $eduLogItems[] = [
                    'rno'        => $rno,
                    'educourse'  => $value,
                    'eduinst'    => $inst[$key],
                    'eduyear'    => $eyear[$key],
                    'dated'      => now()->format('Y-m-d'),
                    'time'       => now()->format('H:i:s'),
                    'empid'      => auth()->user()->username,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            EduLog::create([
                'rno'        => $rno,
                'dated'      => now()->format('Y-m-d'),
                'time'       => now()->format('H:i:s'),
                'empid'      => auth()->user()->username,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            EduLog::insert($eduLogItems);

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
                $orgLogItems[] = [
                    'rno'        => $rno,
                    'orgname'    => $value,
                    'orgdept'    => $orgdept[$key],
                    'orgyear'    => $orgyear[$key],
                    'dated'      => now()->format('Y-m-d'),
                    'time'       => now()->format('H:i:s'),
                    'empid'      => auth()->user()->username,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            OrgLog::create([
                'rno'        => $rno,
                'dated'      => now()->format('Y-m-d'),
                'time'       => now()->format('H:i:s'),
                'empid'      => auth()->user()->username,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            OrgLog::insert($orgLogItems);

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
                $bsLogItems[] = [
                    'rno'        => $rno,
                    'bsname'     => $value,
                    'bs'         => $bs[$key],
                    'bsage'      => $bsage[$key] ?? 0,
                    'bsmarriage' => $bsmarriage[$key],
                    'bsdetails'  => $bsdetails[$key],
                    'dated'      => now()->format('Y-m-d'),
                    'time'       => now()->format('H:i:s'),
                    'empid'      => auth()->user()->username,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            BsLog::create([
                'rno'        => $rno,
                'dated'      => now()->format('Y-m-d'),
                'time'       => now()->format('H:i:s'),
                'empid'      => auth()->user()->username,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            BsLog::insert($bsLogItems);

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
        $filterArray["rl"]     = (int) $data['religion'];
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
        // info($filterArray);
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
        $data['dated'] = $data['dated'] ?? now()->format('Y-m-d');
        $data['time']  = $data['time'] ?? now()->format('H:i:s');
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
                // update followup future date if needed
                Followup::where('rno', $data['rno'])->update(['futuredate' => $data['futuredate']]);
                if ($data['callstatus'] == 1) {
                    ViewProfile::where('rno', $data['rno'])->update(['last_call' => now()->format('Y-m-d')]);
                }
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
            });
            return true;
        } catch (\Exception $e) {
            dd($e);
            // Log the exception or handle it as needed
            return false;
        }
    }

    public function getMeetings($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = Meeting::with('rnoData', 'proposalData')->orderBy($sortBy, $orderBy)
            ->when($request->filled('rno'), fn($query) => $query->where('rno', $request->rno))
            ->when($request->filled('proposal'), fn($query) => $query->where('proposal', $request->proposal))
            ->when($request->filled('meeting_type'), fn($query) => $query->where('meeting_type', $request->meeting_type))
            ->when($request->filled('mtg_by1'), fn($query) => $query->where('mtg_by1', $request->mtg_by1))
            ->when($request->filled('mtg_by2'), fn($query) => $query->where('mtg_by2', $request->mtg_by2))
            ->when($request->filled('att_by1'), fn($query) => $query->where('att_by1', $request->att_by1))
            ->when($request->filled('att_by2'), fn($query) => $query->where('att_by2', $request->att_by2))
            ->when($request->filled('from_date'), fn($query) => $query->where('dated', '>=', $request->from_date))
            ->when($request->filled('to_date'), fn($query) => $query->where('dated', '<=', $request->to_date))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhere('proposal', 'LIKE', "%{$request->search}%")
                        ->orWhereRelation('rnoData', 'refname', 'LIKE', "%{$request->search}%")
                        ->orWhereRelation('proposalData', 'refname', 'LIKE', "%{$request->search}%");
                });
            });

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

        $query = Enquiry::with('viewProfile')->orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('empid'), fn($query) => $query->where('empid', $request->empid))
            ->when($request->filled('slfor'), fn($query) => $query->where('slfor', $request->slfor))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            });

        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function updateEnquiry($identifier, $data)
    {
        return Enquiry::where($identifier)->update($data);
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


    public function storeFeedback($data)
    {
        $data['fdate'] = $data['dated'] ?? now()->format('Y-m-d');
        $data['time']  = $data['time'] ?? now()->format('H:i:s');
        $data['empby'] = $data['empid'] ?? auth()->user()->username;
        return Feedback::create($data);
    }


    public function storeFixMember($data)
    {
        $data['dated'] = $data['dated'] ?? now()->format('Y-m-d');
        $data['time']  = $data['time'] ?? now()->format('H:i:s');

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

    public function checkFixStatus($rno)
    {
        return ViewProfile::where('rno', $rno)->where('status', 'F')->exists();
    }


    public function getFixMembers($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = FixMember::with(['viewProfile'])
            ->orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->filled('fix_by'), fn($query) => $query->where('fix_by', $request->fix_by))
            ->when($request->filled('start_date'), fn($query) => $query->where('dated', '>=', $request->start_date))
            ->when($request->filled('end_date'), fn($query) => $query->where('dated', '<=', $request->end_date))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            });

        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function setFixMember($rno, $pk)
    {
        return DB::transaction(function () use ($rno, $pk) {
            FixMember::where('id', $pk)
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

    public function setActiveMember($rno, $pk)
    {
        return DB::transaction(function () use ($rno, $pk) {
            FixMember::where('id', $pk)
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

    public function deleteFixMember($pk)
    {
        return DB::transaction(function () use ($pk) {
            FixMember::where('id', $pk)
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
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('hold_req_by'), fn($query) => $query->where('hold_req_by', $request->hold_req_by))
            ->when($request->filled('hold_by'), fn($query) => $query->where('hold_by', $request->hold_by))
            ->when($request->filled('start_date'), fn($query) => $query->where('dated', '>=', $request->start_date))
            ->when($request->filled('end_date'), fn($query) => $query->where('dated', '<=', $request->end_date))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            });
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function getAllHoldRecords($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = HoldMember::with('viewProfile')->orderBy($sortBy, $orderBy)
            ->whereHas(
                'viewProfile',
                fn($query) =>
                $query->where('ost', 'F')
                    ->where('status', 'A')
                    ->whereIn('dtype', ['P', 'N'])
            )
            ->whereNotExists(function ($query) {
                $query->from('followup')
                    ->whereColumn('followup.rno', '=', 'hold_member.rno');
            })
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('hold_req_by'), fn($query) => $query->where('hold_req_by', $request->hold_req_by))
            ->when($request->filled('hold_by'), fn($query) => $query->where('hold_by', $request->hold_by))
            ->when($request->filled('start_date'), fn($query) => $query->where('dated', '>=', $request->start_date))
            ->when($request->filled('end_date'), fn($query) => $query->where('dated', '<=', $request->end_date))

            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            });
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function fetchTctlrmMember($rno)
    {
        $pd = ProfileDetail::where('rno', $rno)->first();
        if ($pd) {
            return [
                'tc' => $pd->tc,
                'mc' => $pd->mc,
                'rm' => $pd->rm,
            ];
        }

        $vp = ViewProfile::where('rno', $rno)->first();
        if ($vp) {
            return [
                'tc' => $vp->tc,
                'mc' => $vp->mc,
                'rm' => $vp->rm,
            ];
        }

        return [];
    }



    public function saveTctlrmMember($data)
    {
        return DB::transaction(function () use ($data) {
            $pd = ProfileDetail::where('rno', $data['rno'])->first();
            if ($pd) {
                $pd->tc = $data['tc'];
                $pd->mc = $data['tl'];
                $pd->rm = $data['rm'];
                $pd->save();
            }
            $vp = ViewProfile::where('rno', $data['rno'])->first();
            if ($vp) {
                $vp->tc = $data['tc'];
                $vp->mc = $data['tl'];
                $vp->rm = $data['rm'];
                $vp->save();
            }
            // TODO:: send Notification if old and new values are different
            /**
             * if ($data['tc'] !== $data['old_tc']) {
             * }
             * if ($data['mc'] !== $data['old_mc']) {
             * }
             * if ($data['rm'] !== $data['old_rm']) {
             * }
             */
            return true;
        });
    }

    public function toggleVisited($rno)
    {
        $vp = ViewProfile::where('rno', $rno)->first();
        if ($vp) {
            $vp->vc = $vp->vc == 1 ? 0 : 1;
            if ($vp->save()) {
                return true;
            }
        }
        return false;
    }


    public function toggleOC($rno)
    {
        $vp = ViewProfile::where('rno', $rno)->first();
        if ($vp) {
            $vp->oc = $vp->oc == 1 ? 0 : 1;
            if ($vp->save()) {
                return true;
            }
        }
        return false;
    }

    public function toggleClassified($rno)
    {
        $classified = Classified::where('rno', $rno)->first();
        if ($classified) {
            $status = $classified->status == 1 ? 0 : 1;
        } else {
            $classified      = new Classified();
            $classified->rno = $rno;
            $status          = 1;
            $classified->created_at = now();
        }
        $classified->status     = $status;
        $classified->empid      = auth()->user()->username;
        $classified->dated      = now()->format('Y-m-d');
        $classified->time       = now()->format('H:i:s');
        $classified->updated_at = now();
        if ($classified->save()) {
            return true;
        }
        return false;
    }

    public function getClassified($rno)
    {
        return Classified::where('rno', $rno)->first();
    }

    public function toggleNonActive($rno)
    {
        $vp = ViewProfile::where('rno', $rno)->first();
        if ($vp) {
            $vp->ost = $vp->ost == 'N' ? '' : 'N';
            if ($vp->save()) {
                return true;
            }
        }
        return false;
    }


    public function pickListViewProfileData($request, $selectArray = ['rno', 'refname'], $excludeArray = [])
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';
        $limit   = $request->limit ?? 20;

        $query = ViewProfile::select($selectArray)->orderBy($sortBy, $orderBy)
            ->when($request->q, function ($query) use ($request) {
                $query->where('refname', 'like', "%{$request->q}%")
                    ->orWhere('rno', 'like', "%{$request->q}%");
            })
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->refname, fn($query) => $query->where('refname', 'like', "%{$request->refname}%"));

        if (!empty($excludeArray)) {
            $query->whereNotIn('rno', $excludeArray);
        }

        return  $query->paginate($limit);
    }


    public function convertMember($data)
    {

        $new_rno = CounterNumber::nextNumber('PAID');
        DB::statement('CALL memberconvert(?, ?, ?)', [$data['rno'], $new_rno, auth()->user()->username]);
        return DB::transaction(function () use ($data, $new_rno) {
            $model = ProfileDetail::where('rno', $new_rno)->first();
            $pd = $model ?? new ProfileDetail();
            $pd->rno = $new_rno;
            $pd->tc = $data['tc_code'];
            $pd->mc = $data['tl_code'];
            $pd->rm = $data['rm_code'];
            if ($pd->save()) {
                Snap::where('rno', $data['rno'])->update([
                    'rno' => $new_rno,
                ]);
                return true;
            }

            return false;
            //TODO:: send notification to tc_code, tl_code and rm_code
        });
    }


    public function deleteCustomer($rno)
    {
        return DB::transaction(function () use ($rno) {
            $vp = ViewProfile::where('rno', $rno)->first();
            $refname = $vp->refname;
            DB::statement('CALL deletedata(?)', [$rno]);
            DeleteLog::create([
                'rno' => $rno,
                'refname' => $refname,
                'empid' => auth()->user()->username,
                'dated' => now()->format('Y-m-d'),
                'time' => now()->format('H:i:s'),
            ]);
            return true;
        });
    }


    public function toggleHideMember($rno)
    {
        $vp = ViewProfile::where('rno', $rno)->first();
        if ($vp) {
            if (in_array($vp->dtype, ['N', 'P'])) {
                $dt = 'H';
                $responseTxt = 'hide';
            } elseif ($vp->dtype == 'H') {
                $dt = 'N';
                if (substr($rno, 0, 1) == 4 || substr($rno, 0, 1) == 5) {
                    $dt = 'P';
                }
                $responseTxt = 'unhide';
            } else {
                return 'na';
            }

            $this->setDtypeStatus($rno, $dt);
            return $responseTxt;
        }
        return false;
    }

    public function setDtypeStatus($rno, $dt)
    {
        return DB::transaction(function () use ($rno, $dt) {
            ViewProfile::where('rno', $rno)->update([
                'dtype' => $dt,
            ]);
            ProfileBio::where('rno', $rno)->update([
                'dtype' => $dt,
            ]);
        });
    }



    public function checkMobiles(array $mobiles): bool
    {
        $existing = ProfilePersonal::where(function ($q) use ($mobiles) {
            foreach ($mobiles as $mobile) {
                $q->orWhere('contactphone', 'like', "%{$mobile}%");
            }
        })->pluck('contactphone')->toArray();

        return count($existing) < count($mobiles);
    }

    public function getContactDetails($rno)
    {
        return ProfilePersonal::where('rno', $rno)->select('contactphone', 'contactemail')->first();
    }
}
