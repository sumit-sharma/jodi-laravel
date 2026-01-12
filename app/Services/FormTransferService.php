<?php

namespace App\Services;

use App\Models\FormTransfer;
use Illuminate\Support\Facades\DB;

class FormTransferService
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

        return FormTransfer::with(['viewProfile'])->orderBy($sortBy, $orderBy)
            ->when($request->rno, fn($query) => $query->where('rno', $request->rno))
            ->when($request->assign_to, fn($query) => $query->where('assign_to', $request->assign_to));
        // ->when($request->status, fn($query) => $query->whereRelation('viewProfile', 'status', $request->status));
    }

    public function show($rno)
    {
        return FormTransfer::where('rno', $rno)->first();
    }

    public function store($data)
    {
        $data['assign_from'] = auth()->user()->username;
        $data['assign_date'] = $data['assign_date'] ?? now()->format('Y-m-d');
        $data['assign_time'] = $data['assign_time'] ?? now()->format('H:i:s');
        return DB::transaction(function () use ($data) {
            $formTransfer = FormTransfer::create($data);
            //TODO:: add notification
            return $formTransfer;
        });
    }
}
