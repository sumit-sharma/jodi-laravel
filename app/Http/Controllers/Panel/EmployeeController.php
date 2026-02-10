<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\MiscService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 25, 'page' => $request->page ?? 1]);
        if (!$request->show_all) {
            $request->merge(['status' => $request->status ?? '1']);
        }
        $data['employees'] = $this->userService->index($request);

        return view('panel.reports.employee-list', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAllRmData(Request $request)
    {
        $request->merge([
            'limit' => $request->limit ?? 10,
            'page' => $request->page ?? 1,
            'dtype' => $request->dtype ?? 'P',
            'status' => $request->status ?? 'A',
            'not_ost' => $request->not_ost ?? ['F', 'N'],
        ]);
        $data['employees'] = $this->userService->getAllrmUsers($request);
        // dd($data['employees']);
        return view('panel.Services.show-all-rm-data', $data);
    }

    public function passwordRegenerate(Request $request, $username)
    {
        $result = $this->userService->passwordRegenerate($username);
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Password reset successfully',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Error: Contact System Admin.',
        ]);
    }

    public function toggleEmployeeStatus(Request $request, $username)
    {
        $result = $this->userService->toggleEmployeeStatus($username);
        return $result;
    }

    public function addAttendance(Request $request)
    {
        $validated = $request->validate([
            'empid'   => 'required',
            'dated'   => 'required',
            'intime'  => 'required',
            'outtime' => 'required',
            'status'  => 'required',
            'remarks' => 'nullable',
        ]);
        $validated['ent_by'] = auth()->user()->username;
        $result = $this->userService->addAttendance($validated);
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Attendance added successfully',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Error: Contact System Admin.',
        ]);
    }

    public function getAttendance($empid, $dated)
    {
        try {
            $msg = "No attendance found for the selected date";
            $result = $this->userService->getAttendance($empid, $dated);
            if ($result) {
                $msg = "Attendance found successfully";
            }
            return response()->json([
                'status' => 'success',
                'message' => $msg,
                'data' => $result ?? null,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'dated' => 'nullable',
            'time' => 'nullable',
            'msgfrom' => 'nullable',
            'msgto' => 'required',
            'message' => 'required',
        ]);

        $result = $this->userService->sendMessage($validated);
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Message sent successfully',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Error: Contact System Admin.',
        ]);
    }


    public function addReminder(Request $request)
    {
        // $data['employees'] = $this->userService->getAllrmUsers($request);
        return view('panel.others.reminders.add-message');
    }

    public function showReminders(Request $request)
    {

        $request->merge(['limit' => $request->limit ?? 25, 'page' => $request->page ?? 1, 'msgfrom' => auth()->user()->username, 'msgto' => auth()->user()->username]);
        $data['messages'] = $this->userService->getMessages($request);
        return view('panel.others.reminders.messages-list', $data);
    }

    public function printRequestList(Request $request)
    {
        $request->merge([
            'limit' => $request->limit ?? 25,
            'page' => $request->page ?? 1,
        ]);
        $data['printRequests'] = $this->userService->getPrintRequests($request);
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc');
        return view('panel.others.print-request', $data);
    }

    public function approveRejectPrintJob(Request $request)
    {
        $validated = $request->validate([
            'action' => ['required', Rule::in(['approve', 'reject', 'delete'])],
            'print_id' => ['required', 'exists:printprofile,id'],
        ]);

        $result = $this->userService->approveRejectPrintJob($validated);
        if ($result) {
            return response()->json(['status' => 'success', 'message' => 'Print job ' . $validated['action'] . ' successfully', 'data' => $result]);
        }

        return response()->json([
            'status' => 'error',
            'message' => "Unable to {$validated['action']}",
        ]);
    }
}
