<?php

namespace App\Services;

use App\Models\FreshCall;

class FreshCallService
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

        return FreshCall::orderBy($sortBy, $orderBy)
            ->when($request->empid, fn($query) => $query->where('empid', $request->empid))
            ->when($request->dated, fn($query) => $query->where('dated', $request->dated));
    }

    public function store($data)
    {
        return FreshCall::create($data);
    }
}
