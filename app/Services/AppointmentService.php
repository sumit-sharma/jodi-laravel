<?php

namespace App\Services;

use App\Models\Appointment;

class AppointmentService
{
    public function index($request)
    {
        $query = $this->loadData($request);
        return $request->limit ? $query->limit($request->limit)->paginate($request->limit) : $query->get();
    }

    protected function loadData($request)
    {
        $orderBy = $request->has('orderBy') ? strtoupper($request->orderBy) : 'DESC';
        $sortBy  = $request->has('sortBy') ? $request->sortBy : 'id';

        return Appointment::orderBy($sortBy, $orderBy)
            ->when($request->empid, fn($query) => $query->where('empid', $request->empid));
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
