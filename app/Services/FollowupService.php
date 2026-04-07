<?php

namespace App\Services;

use App\Models\EmpDetail;
use App\Models\Followup;
use App\Models\FollowupAutolog;
use App\Models\FollowupLog;
use App\Models\Prospective;
use App\Models\User;
use App\Models\ViewProfile;
use Illuminate\Support\Facades\DB;

class FollowupService
{

    public function index($request)
    {
        $query = $this->loadData($request);
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    protected function loadData($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy = $request->has('sortBy') ? $request->sortBy : 'id';

        return Followup::with(['viewProfile', 'viewProfile.bio', 'ViewProfile.income', 'ViewProfile.personal'])->orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->empid, fn($query) => $query->where('empid', $request->empid))
            ->when($request->g, fn($query) => $query->whereRelation('viewProfile', 'g', $request->g))
            ->when($request->d_by, fn($query) => $query->where('d_by', $request->d_by))
            ->when($request->isFutureday, fn($query) => $query->where('futuredate', '>=', now()))
            ->when($request->status, fn($query) => $query->whereRelation('viewProfile', 'status', $request->status))
            ->when($request->filled('start_date'), fn($query) => $query->where('dated', '>=', $request->start_date))
            ->when($request->filled('end_date'), fn($query) => $query->where('dated', '<=', $request->end_date))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhereRelation('viewProfile', 'refname', 'LIKE', "%{$request->search}%");
                });
            });
    }


    public function show($rno)
    {
        return Followup::where('rno', $rno)->first();
    }

    public function store($data)
    {
        return DB::transaction(function () use ($data) {
            $data['dated'] = $data['dated'] ?? now()->format('Y-m-d');
            $data['d_by'] = auth()->user()->username;
            $data['futuredate'] = $data['futuredate'] ?? now()->addDays(7)->format('Y-m-d');
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $rno = $data['rno'];
            unset($data['rno']);
            $status = Followup::updateOrCreate(['rno' => $rno], $data);
            FollowupLog::create([
                'rno' => $rno,
                'd_to' => $data['empid'],
                'd_by' => auth()->user()->username,
                'dated' => $data['dated'],
                'time' => now()->format('H:i:s')
            ]);
            ViewProfile::where('rno', $rno)->update(['ost' => 'F', 'tc' => $data['empid']]);
            return $status;
        });
    }

    public function checkLimit($empid, $rno = null)
    {
        if ($rno) {
            $ref = Followup::where('empid', $empid)->where('rno', $rno)->first();
            if ($ref) {
                return true;
            }
        }
        $limit = Followup::where('empid', $empid)->count();
        if ($limit < config('constants.FOLLOWUP_LIMIT')) {
            return true;
        }
        return false;
    }
    public function fetchFollowups()
    {
        return User::select('username', 'name')
            ->whereIn('username', function ($query) {
                $query->select('empid')
                    ->from('followup');
            })
            ->orderBy('name')
            ->get();
    }
    public function transferFollowupsStore($request)
    {
        $followup = Followup::where('empid', $request->followsfrom)
            ->update(['empid' => $request->followsto]);
        //$prospective = Prospective::where('empid', $request->followsfrom)
        //->update(['empid' => $request->followupto]);
        return $followup;
        //&& $prospective > 0);
    }
}
