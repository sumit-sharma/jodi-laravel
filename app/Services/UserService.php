<?php

namespace App\Services;

use App\Models\User;
use App\Models\ViewProfile;
use Illuminate\Support\Facades\DB;

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
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        return User::with(['details'])->orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->empid, fn($query) => $query->where('empid', $request->empid))
            ->when($request->status, fn($query) => $query->whereRelation('viewProfile', 'status', $request->status));
    }
}
