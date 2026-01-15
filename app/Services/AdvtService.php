<?php

namespace App\Services;

use App\Models\Advtdata;

class AdvtService
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

        return Advtdata::with(['viewProfile'])->orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->empid, fn($query) => $query->where('empid', $request->empid))
            ->when($request->assignto, fn($query) => $query->where('assignto', $request->assignto));
        // ->when($request->status, fn($query) => $query->whereRelation('viewProfile', 'status', $request->status));
    }



    public function fetchAdvtData($rno)
    {
        $request = request();
        $request->merge(['rno' => $rno]);
        $query = $this->loadData($request);
        return $query->first();
    }


    public function saveAdvtData($rno, array $data)
    {
        $data['created_at'] = now();
        $data['updated_at'] = now();
        return Advtdata::updateOrCreate(['rno' => $rno], $data);
    }
}
