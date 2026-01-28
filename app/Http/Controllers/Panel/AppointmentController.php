<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAppointmentRequest;
use App\Services\AppointmentService;
use App\Services\MiscService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index(Request $request)
    {
        $request->merge(['limit' => 100]);
        $data['appointments'] = $this->appointmentService->index($request);
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");
        return view('panel.Data.add-edit-appointment', $data);
    }

    public function show(Request $request, $id)
    {
        $appointment = $this->appointmentService->show($id);
        if ($request->expectsJson()) {
            return response()->json(['status' => 'success', 'data' => $appointment]);
        }
    }

    public function saveAppointment(SaveAppointmentRequest $request)
    {
        $data = $request->validated();
        $data['empid'] = auth()->user()->username;
        unset($data['appointment_id']);
        if ($request->appointment_id) {
            $data['update_date'] = now()->format('Y-m-d');
            $result =   $this->appointmentService->updateAppointment($data, $request->appointment_id);
        } else {
            $result = $this->appointmentService->storeAppointment($data);
        }

        if ($request->expectsJson()) {
            return response()->json(['status' => 'success', 'data' => $result]);
        }
    }


    public function appointmentReport(Request $request)
    {
        $request->merge(['limit' => 50]);
        // if ($request->filled('from_date') && $request->filled('to_date')) {
        $data['appointments'] = $this->appointmentService->index($request);
        // }
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");
        return view('panel.reports.appointment-report', $data);
    }

    // public function appointmentReportStore(Request $request)
    // {
    //     $data = $request->validated();
    //     $data['empid'] = auth()->user()->username;
    //     unset($data['appointment_id']);
    //     if ($request->appointment_id) {
    //         $data['update_date'] = now()->format('Y-m-d');
    //         $result =   $this->appointmentService->updateAppointment($data, $request->appointment_id);
    //     } else {
    //         $result = $this->appointmentService->storeAppointment($data);
    //     }

    //     if ($request->expectsJson()) {
    //         return response()->json(['status' => 'success', 'data' => $result]);
    //     }
    // }
}
