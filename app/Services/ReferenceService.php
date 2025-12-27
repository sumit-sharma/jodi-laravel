<?php

namespace App\Services;

use App\Models\Reference;

class ReferenceService
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

        return Reference::with('bio')->orderBy($sortBy, $orderBy)
            ->when($request->refno, fn($query) => $query->where('refno', $request->refno));
    }

    public function store($data)
    {
        return Reference::create($data);
    }

    public function show($refno)
    {
        return Reference::where('refno', $refno)->first();
    }

    public function update($data, $refno)
    {
        return Reference::where('refno', $refno)->update($data);
    }
}
