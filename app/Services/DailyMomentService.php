<?php

namespace App\Services;

use App\Models\DailyMoment;

class DailyMomentService
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

        return DailyMoment::orderBy($sortBy, $orderBy)
            ->when($request->empid, fn($query) => $query->where('empid', $request->empid))
            ->when($request->dated, fn($query) => $query->where('dated', $request->dated));
    }

    public function store($data)
    {
        $data['empid'] = $data['empid'] ?? auth()->user()->username;
        return DailyMoment::create($data);
    }
}
