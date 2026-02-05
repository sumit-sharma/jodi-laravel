<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\EditDataLog;
use App\Models\FollowupAutolog;
use App\Models\Interaction;
use App\Models\Meeting;
use App\Models\ProfileMatch;
use App\Models\ViewProfile;
use Illuminate\Support\Facades\DB;

class ReportService
{


    public function getNoTouchReport($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query =  ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            'education',
            'organisation',
            'payment',
            'profilebs',
            'personal.zone'
        ])->orderBy($sortBy, $orderBy);
        $date = now()->subDays($request->ntp)->format('Y-m-d');
        if ($request->nts == 2) {
            $query->whereNotIn('rno', function ($query) use ($date) {
                $query->select('rno')
                    ->from('interaction')
                    ->where('dated', '>', $date);
            })
                ->whereNotIn('rno', function ($query) use ($date) {
                    $query->select('rno')
                        ->from('sendmail')
                        ->where('dated', '>', $date)
                        ->where('status', 1);
                });
        } elseif ($request->nts == 0) {
            $query->whereNotIn('rno', function ($query) use ($date) {
                $query->select('rno')
                    ->from('interaction')
                    ->where('dated', '>', $date);
            });
        } elseif ($request->nts == 1) {
            $query->whereNotIn('rno', function ($query) use ($date) {
                $query->select('rno')
                    ->from('sendmail')
                    ->where('dated', '>', $date)
                    ->where('status', 1);
            });
        }

        if ($request->dtype == 'H') {
            $request->dtype = 'P';
            $query->where('ost', '');
        } elseif ($request->dtype == 'both') {
            $request->dtype = "P,N";
        }

        $query->when($request->filled('emp_id'), fn($query) => $query->where('rm', $request->emp_id))
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            // ->when($request->filled('dated'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('dtype'), fn($query) => $query->whereIn('dtype', explode(',', $request->dtype)));

        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function getAttendanceData($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = Attendance::with(['user', 'user.details'])->orderBy($sortBy, $orderBy)
            ->when($request->filled('empid'), fn($query) => $query->where('empid', $request->empid))
            ->when($request->filled('dated'), fn($query) => $query->where('dated', $request->dated))
            ->when($request->filled('start_date'), fn($query) => $query->where('dated', '>=', $request->start_date))
            ->when($request->filled('end_date'), fn($query) => $query->where('dated', '<=', $request->end_date))
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->whereRelation('user', 'name', 'LIKE', "%{$request->search}%")
                        ->orWhere('status', 'LIKE', "%{$request->search}%")
                        ->orWhere('remarks', 'LIKE', "%{$request->search}%");
                });
            });

        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }


    public function getMeetingsReport($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = Meeting::with('rnoData', 'proposalData')
            ->whereHas('rnoData', function ($query) use ($request) {
                $query->whereIn('dtype', ['P', 'N']);
            })
            ->whereHas('proposalData', function ($query) use ($request) {
                $query->whereIn('dtype', ['P', 'N']);
            })
            ->orderBy($sortBy, $orderBy)
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



    public function getNoMeetingsReport($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $date = now()->subDays($request->ntp)->format('Y-m-d');

        $query =  ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            'education',
            'organisation',
            'payment',
            'profilebs',
            'personal.zone'
        ])->orderBy($sortBy, $orderBy)
            ->whereNotIn('rno', function ($query) use ($date) {
                $query->select('rno')
                    ->from('meeting')
                    ->where('dated', '>', $date);
            })
            ->whereNotIn('rno', function ($query) use ($date) {
                $query->select('proposal')
                    ->from('meeting')
                    ->where('dated', '>', $date);
            })
            ->when($request->filled('empid'), fn($query) => $query->where('rm', $request->empid))
            ->when($request->filled('dtype'), fn($query) => $query->where('dtype', explode(',', $request->dtype)))
            ->when($request->filled('status'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('ost'), fn($query) => $query->where('status', $request->status))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhere('proposal', 'LIKE', "%{$request->search}%");
                });
            });

        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }



    public function getEditLogsReport($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = EditDataLog::orderBy($sortBy, $orderBy)
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhere('proposal', 'LIKE', "%{$request->search}%");
                });
            });

        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }
    public function getEditDataLogsReport($request)
    {
        $startDate = '2025-07-01';
        $endDate = '2025-09-30';

        if ($request->filled('start_date')) {
            $startDate = $request->start_date;
        }

        if ($request->filled('end_date')) {
            $endDate = $request->end_date;
        }

        // Query 1: EditDataLog
        $query1 = EditDataLog::from('editdatalog as e')
            ->selectRaw('e.dated, e.time, e.empid, ed.loginname, e.rno, v.refname, e.empid as empid_2, e.field, e.olddata, e.newdata, 0 as fl')
            ->leftJoin('viewprofile as v', 'v.rno', '=', 'e.rno')
            ->leftJoin('users as u', 'u.username', '=', 'e.empid')
            ->leftJoin('emp_details as ed', 'ed.user_id', '=', 'u.id')
            ->whereBetween('e.dated', [$startDate, $endDate]);

        // Query 2: Edu Log
        $query2 = DB::table('edu_log as e')
            ->selectRaw('e.dated, e.time, e.empid, ed.loginname, e.rno, v.refname, e.empid as empid_2, e.educourse as field, e.eduinst as olddata, e.eduyear as newdata, 1 as fl')
            ->leftJoin('viewprofile as v', 'v.rno', '=', 'e.rno')
            ->leftJoin('users as u', 'u.username', '=', 'e.empid')
            ->leftJoin('emp_details as ed', 'ed.user_id', '=', 'u.id')
            ->whereBetween('e.dated', [$startDate, $endDate]);

        // Query 3: Org Log
        $query3 = DB::table('org_log as e')
            ->selectRaw('e.dated, e.time, e.empid, ed.loginname, e.rno, v.refname, e.empid as empid_2, e.orgname as field, e.orgdept as olddata, e.orgyear as newdata, 2 as fl')
            ->leftJoin('viewprofile as v', 'v.rno', '=', 'e.rno')
            ->leftJoin('users as u', 'u.username', '=', 'e.empid')
            ->leftJoin('emp_details as ed', 'ed.user_id', '=', 'u.id')
            ->whereBetween('e.dated', [$startDate, $endDate]);

        $finalQuery = $query1->unionAll($query2)->unionAll($query3)
            ->orderBy('dated', 'desc');

        return $request->limit ? $finalQuery->paginate($request->limit) : $finalQuery->get();
    }

    public function getMyFutureCalls($request)
    {
        $query =  Interaction::with('viewProfile')
            ->where('empid', auth()->user()->username)
            ->where('futuredate', today())
            ->when($request->filled('start_date'), fn($q) => $q->where('dated', '>=', $request->start_date))
            ->when($request->filled('end_date'), fn($q) => $q->where('dated', '<=', $request->end_date))
            ->orderBy('dated', 'asc');
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }

    public function getMyTodaysMails($request)
    {

        $rd = date('N');
        $query = ProfileMatch::with('viewProfile')
            ->whereRelation('viewProfile', 'rm', auth()->user()->username)
            ->when($request->filled('tc'), fn($q) => $q->whereRelation('viewProfile', 'tc', $request->tc))
            // ->where('mr', 'LIKE', "%{$rd}%")
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhereHas('viewProfile', function ($q) use ($request) {
                            $q->where('refname', 'LIKE', "%{$request->search}%")
                                ->orWhere('tc', 'LIKE', "%{$request->search}%");
                        });
                });
            })
            ->orderBy('id', 'desc');
        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }


    public function getFollowupAutoLogs($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        $query = FollowupAutolog::with('viewProfile')->orderBy($sortBy, $orderBy)
            ->when($request->filled('start_date'), fn($q) => $q->where('dated', '>=', $request->start_date))
            ->when($request->filled('end_date'), fn($q) => $q->where('dated', '<=', $request->end_date))
            ->when($request->filled('rno'), fn($q) => $q->where('rno', $request->rno))
            ->when($request->filled('empid'), fn($q) => $q->where('empid', $request->empid))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('rno', 'LIKE', "%{$request->search}%")
                        ->orWhereHas('viewProfile', function ($q) use ($request) {
                            $q->where('refname', 'LIKE', "%{$request->search}%");
                        });
                });
            });

        return $request->limit ? $query->paginate($request->limit) : $query->get();
    }
}
