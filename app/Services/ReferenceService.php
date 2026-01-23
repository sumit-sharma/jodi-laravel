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
            ->when($request->refno, fn($query) => $query->where('refno', $request->refno))
            ->when($request->contactno, fn($query) => $query->where('contactno', 'LIKE', "%{$request->contactno}%"))
            ->when($request->emailid, fn($query) => $query->where('emailid', 'LIKE', "%{$request->emailid}%"))
            ->when($request->assignto, fn($query) => $query->where('assignto', $request->assignto))
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('refno', 'LIKE', "%{$request->search}%")
                        ->orWhere('referencename', 'LIKE', "%{$request->search}%")
                        ->orWhere('candidatename', 'LIKE', "%{$request->search}%");
                });
            });
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
