<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class HoldMemberController extends Controller
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
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['members'] = $this->customerService->getHoldMembers($request);
        return view('panel.Data.hold-list', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rno' => 'required',
            'hold_by' => 'required',
            'reason' => 'required',
            'status' => 'required',
        ]);
        // dd($validated);
        $result  = $this->customerService->toggleHoldReleaseMember($validated);
        if ($result) {
            $status = $validated['status'] == 0 ? 'hold ' : 'release';
            return response()->json([
                'status' => 'success',
                'message' => "Member status updated to {$status}",
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Operation failed',
        ]);
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


    public function checkHoldMember(int $rno)
    {
        $holdMemberCount = $this->customerService->checkHoldMember($rno);

        if ($holdMemberCount > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Member is in Hold/Followup',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Member is not in Hold/Followup',
        ]);
    }
}
