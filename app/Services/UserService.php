<?php

namespace App\Services;

use App\Models\EmpDetail;
use App\Models\FeedbackOption;
use App\Models\ProfileDetail;
use App\Models\User;
use App\Models\LinkTlTc;
use App\Models\ViewProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{


    public function getAllrmUsers($request)
    {

        $query = ViewProfile::with(['rmData'])
            // ->select('rm', 'rmData')
            ->select('rm', DB::raw('COUNT(rm) as count'))
            ->when($request->dtype, fn($query) => $query->where('dtype', $request->dtype))
            ->when($request->ost, fn($query) => $query->where('ost', $request->ost))
            ->when($request->not_ost, fn($query) => $query->whereNotIn('ost', $request->not_ost))
            ->when($request->status, fn($query) => $query->where('status', $request->status));
        $query = $query->groupBy('rm')->orderBy('count', 'DESC');
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }



    public function index($request)
    {
        $query = $this->loadData($request);
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    protected function loadData($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy = $request->has('sortBy') ? $request->sortBy : 'id';

        return User::with(['details'])->orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->empid, fn($query) => $query->where('empid', $request->empid))
            ->when($request->status, fn($query) => $query->whereRelation('viewProfile', 'status', $request->status));
    }

    public function changePassword($request)
    {
        $user = auth()->user();
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors([
                'old_password' => 'Old password is incorrect.',
            ]);

        }
        return $user->update([
            'password' => Hash::make($request->password),
        ]);

    }
    public function fetchTltcData()
    {
        return $data = DB::table('link_tl_tc as l')
            ->join('emp_details as ed', 'ed.loginname', '=', 'l.tl')
            ->join('emp_details as ed1', 'ed1.loginname', '=', 'l.tc')
            ->select([
                'l.tl',
                'ed.loginname',
                'l.tc',
                'ed1.loginname as loginname1',
            ])
            ->orderBy('ed.loginname')
            ->get();
    }
    public function storeTltcData($request)
    {
        return LinkTlTc::insert(['tl' => $request->tl, 'tc' => $request->tc]);
    }
    public function fetchuserTltc()
    {
        return User::with([
            'details' => function ($query) {
                $query->where(function ($q) {
                    $q->where('department', 'TL')
                        ->orWhere('department', 'BM')
                        ->orWhere('department', 'HS');
                });
            }
        ])
            ->get();
    }
    public function fetchuserTc()
    {
        return User::with([
            'details' => function ($query) {
                $query->where('department', 'TC');
            }
        ])
            ->get();
    }

    public function fetchRm()
    {
        return User::with(['details'])
            ->get();

    }
    public function rmStore($request)
    {
        $pn = str_contains($request->pn, ',')
            ? explode(',', $request->pn)
            : [$request->pn];
        $status = str_contains($request->status, ',')
            ? explode(',', $request->status)
            : [$request->status];

        $vpUpdated = ViewProfile::where('rm', $request->oldrm)
            ->whereIn('dtype', $pn)
            ->whereIn('status', $status)
            ->update([
                'rm' => $request->newrm
            ]);
        $pdUpdated = ProfileDetail::where('rm', $request->oldrm)
            ->whereExists(function ($query) use ($pn, $status) {
                $query->select(DB::raw(1))
                    ->from('viewprofile')
                    ->whereColumn('viewprofile.rno', 'profile_details.rno')
                    ->whereIn('viewprofile.dtype', $pn)
                    ->whereIn('viewprofile.status', $status);
            })
            ->update([
                'rm' => $request->newrm
            ]);

        return ($vpUpdated > 0 && $pdUpdated > 0);
    }
    public function tcStore($request)
    {
        $pn = str_contains($request->pn, ',')
            ? explode(',', $request->pn)
            : [$request->pn];
        $status = str_contains($request->status, ',')
            ? explode(',', $request->status)
            : [$request->status];

        $vpUpdated = ViewProfile::where('tc', $request->oldtc)
            ->whereIn('dtype', $pn)
            ->whereIn('status', $status)
            ->update([
                'tc' => $request->newtc
            ]);
        $pdUpdated = ProfileDetail::where('tc', $request->oldtc)
            ->whereExists(function ($query) use ($pn, $status) {
                $query->select(DB::raw(1))
                    ->from('viewprofile')
                    ->whereColumn('viewprofile.rno', 'profile_details.rno')
                    ->whereIn('viewprofile.dtype', $pn)
                    ->whereIn('viewprofile.status', $status);
            })
            ->update([
                'tc' => $request->newtc
            ]);

        return ($vpUpdated > 0 && $pdUpdated > 0);
    }
    public function fetchFeedbacks()
    {
        return FeedbackOption::orderBy('feedback', 'ASC')->get();
    }
    public function feedbackOptionStore($request)
    {
        return FeedbackOption::insert(['feedback' => $request->feedback]);
    }
    public function updatemyInfo($request)
    {
        $emp= EmpDetail::where('user_id', auth()->user()->id)
            ->update([
                "loginname" => $request->loginname,
                "dob" => $request->dob,
                "joiningdate" => $request->joiningdate,
                "anniversary" => $request->anniversary,
                "father_name" => $request->father_name,
                "mobile_type" => $request->mobile_type,
                "curr_address" => $request->curr_address,
                "per_address" => $request->per_address
            ]);
        $user = User::where('id', auth()->user()->id)->update(["mobile"=>$request->mobile]);    
    return ($emp > 0 && $user > 0);
    }
}
