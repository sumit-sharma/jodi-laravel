<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CustomerService;

class FixMemberController extends Controller
{

    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 30, 'page' => $request->page ?? 1]);
        $data['members'] = $this->customerService->getFixMembers($request);
        return view('panel.Customer.fix.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fix_by' => 'required',
            'fixed_through' => 'required',
            'remarks' => 'required',
            'rno' => 'required',
            'status' => 'required',
        ]);

        switch ((int) $request->status) {
            case 0:
                $label = "Fix";
                break;
            case 1:
                $label = "Active";
                break;
        }

        $result = $this->customerService->storeFixMember($validated);
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => "{$label} Member created successfully",
                'data' => $result,
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => "{$label} Member creation failed",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function checkFixMember(int $rno)
    {
        $label = "Fix";
        $holdMemberCount = $this->customerService->checkHoldMember($rno);

        if ($holdMemberCount > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Member is in Hold/Followup',
            ]);
        }
        $fixMemberCount = $this->customerService->checkEligibleFixMember($rno);
        if ($fixMemberCount > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Already Entered',
            ]);
        }

        $fixStatus = $this->customerService->checkFixStatus($rno);
        if ($fixStatus) {
            $label = "Active";
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Member is available for fix',
            'label' => $label,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

    public function updateFixActiveJob(string $action, int $rno, $pk = null)
    {
        switch ($action) {
            case 'fix':
                $result = $this->customerService->setFixMember($rno, $pk);
                $msg = 'Member fixed successfully';
                break;
            case 'active':
                $result = $this->customerService->setActiveMember($rno, $pk);
                $msg = 'Member activated successfully';
                break;
            case 'delete':
                $result = $this->customerService->deleteFixMember($pk);
                $msg = 'Member deleted successfully';
                break;
        }
        if (isset($result)) {
            return response()->json([
                'status' => 'success',
                'message' => $msg,
                'data' => $result,
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Fix Member update failed',
        ]);
    }
}
