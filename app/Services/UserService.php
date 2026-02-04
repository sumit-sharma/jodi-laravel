<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\EmpDetail;
use App\Models\FeedbackOption;
use App\Models\Followup;
use App\Models\ProfileDetail;
use App\Models\User;
use App\Models\LinkTlTc;
use App\Models\Message;
use App\Models\ViewProfile;
use Illuminate\Support\Arr;
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
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('department'), fn($query) => $query->whereRelation('details', 'department', 'like', "%{$request->department}%"))
            ->when($request->filled('offday'), fn($query) => $query->whereRelation('details', 'offday', 'like', "%{$request->offday}%"))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('username', 'LIKE', "%{$request->search}%")
                        ->orWhere('name', 'LIKE', "%{$request->search}%")
                        ->orWhere('mobile', 'LIKE', "%{$request->search}%");
                });
            });
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
        return LinkTlTc::with(['linkedTC', 'linkedTL'])
            ->get();
    }
    public function storeTltcData($request)
    {
        return LinkTlTc::updateOrCreate(
            ['tc' => $request->tc],
            ['tl' => $request->tl]
        );
    }
    public function fetchuserTltc()
    {
        return User::with('details')
            ->whereHas('details', fn($q) => $q->whereIn('department', ['TL', 'BM', 'HS']))
            ->where('status', 1)
            ->orderBy('name', 'asc')
            ->get();
    }
    public function fetchuserTc()
    {
        return User::with('details')
            ->whereRelation('details', 'department', 'TC')
            ->where('status', 1)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function fetchRm()
    {
        return User::with(['details'])
            ->where('status', 1)
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
        $emp = EmpDetail::where('user_id', auth()->user()->id)
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
        $user = User::where('id', auth()->user()->id)->update(["mobile" => $request->mobile]);
        return ($emp > 0 && $user > 0);
    }
    public function empDetails()
    {
        return EmpDetail::get();
    }
    public function timngStore($request)
    {
        return EmpDetail::where('user_id', $request->user_id)
            ->update([
                "intime" => $request->intime,
                "outtime" => $request->outtime,
                "offday" => $request->offday
            ]);
    }
    public function resetPassword($request)
    {
        $user = User::where('id', $request->user_id)->first();
        return $user->update([
            'password' => Hash::make($request->password),
        ]);
    }
    public function passwordRegenerate($username)
    {
        $user = User::where('username', $username)->first();
        return $user->update([
            'password' => Hash::make('12345678'),
        ]);
    }
    public function makeuserStore($request)
    {
        $request->validate([
            'department' => 'required',
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10|unique:users,mobile',
            'password' => 'required|min:6|confirmed'
        ]);
        $password = Hash::make($request->password);
        return User::insert([
            'department' => $request->department,
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $password
        ]);
    }
    public function toggleEmployeeStatus($username)
    {
        $msg = 'Employee have been activated successfully';
        $user = User::where('username', $username)->first();
        if ($user->status == 1) {
            $followupCount = Followup::where('empid', $username)->count();
            if ($followupCount > 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Employee has followup data. Please remove followup data before deactivating.',
                ]);
            }
            $msg = 'Employee have been deactivated successfully';
        }

        $user->status = $user->status == 1 ? 0 : 1;
        $user->is_blocked = !$user->is_blocked;
        if ($user->save()) {
            return response()->json([
                'status' => 'success',
                'message' => $msg,
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error: Contact System Admin.',
        ]);
    }


    public function addAttendance($data)
    {
        $identifier =   Arr::only($data, ['empid', 'dated']);
        $data = Arr::except($data, ['empid', 'dated']);
        return Attendance::updateOrCreate($identifier, $data);
    }

    public function getAttendance($empid, $dated)
    {
        return Attendance::where('empid', $empid)
            ->where('dated', $dated)
            ->first();
    }



    public function sendMessage($data)
    {
        return Message::create([
            'dated'    => $data['dated'] ?? date('Y-m-d'),
            'time'     => $data['time'] ?? date('H:i:s'),
            'msgfrom'  => $data['msgfrom'] ?? auth()->user()->username,
            'msgto'    => $data['msgto'],
            'message'  => $data['message'],
            'received' => $data['received'] ?? null,
        ]);
    }

    public function getMessages($request)
    {
        return Message::with(['fromUser', 'toUser'])
            ->when($request->filled('msgfrom'), fn($query) => $query->where('msgfrom', $request->msgfrom))
            ->when($request->filled('msgto'), fn($query) => $query->where('msgto', $request->msgto))
            ->orderBy('dated', 'desc')
            ->orderBy('time', 'desc')
            ->paginate();
    }
}
