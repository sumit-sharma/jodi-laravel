<?php

namespace App\Services;

use App\Models\Appointment;

class AppointmentService
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

        return Appointment::orderBy($sortBy, $orderBy)
            ->when($request->filled('empid'), fn($query) => $query->where('empid', $request->empid))
            ->when($request->filled('from_date'), fn($query) => $query->where('aptdate', '>=', $request->from_date))
            ->when($request->filled('to_date'), fn($query) => $query->where('aptdate', '<=', $request->to_date))
            ->when($request->filled('apttype'), fn($query) => $query->where('apttype', $request->apttype))
            ->when($request->filled('aptstatus'), fn($query) => $query->where('aptstatus', $request->aptstatus));
    }

    public function show($id)
    {
        return Appointment::find($id);
    }

    public function storeAppointment($data)
    {
        return Appointment::create($data);
    }

    public function updateAppointment($data, $id)
    {
        return Appointment::updateOrCreate(['id' => $id], $data);
    }
}
