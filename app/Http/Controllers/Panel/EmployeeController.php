<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

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
}
