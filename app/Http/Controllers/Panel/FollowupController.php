<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Services\FollowupService;
use App\Services\MiscService;

class FollowupController extends Controller
{

    protected $followupService;
    protected $userService;
    public function __construct(FollowupService $followupService, UserService $userService)
    {

        $this->followupService = $followupService;
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inputFilter = ['limit' => $request->limit ?? 30, 'page' => $request->page ?? 1, 'status' => 'A'];
        if (!auth()->user()->can('View All Followup')) {
            $inputFilter['empid'] = $request->empid ?? auth()->user()->username;
        }
        $request->merge($inputFilter);
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        $data['followups'] = $this->followupService->index($request);
        $data['heading'] = 'All My Follow Ups';
        // dd($data['followups'][0]->viewProfile->bio);
        return view('panel.Follow.my-all-follow-ups', $data);
    }

    public function followUpRecords(Request $request)
    {
        $requestInput = ['limit' => $request->limit ?? 30, 'page' => $request->page ?? 1, 'status' => 'A', 'isFutureday' => 1];
        if (auth()->user()->can('View All Followup')) {
            $requestInput['empid'] = $request->empid ?? auth()->user()->username;
        }

        $request->merge($requestInput);
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        $data['followups'] = $this->followupService->index($request);
        $data['heading'] = 'All Follow Ups Records';
        return view('panel.Follow.my-all-follow-ups', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rno' => 'required',
            'empid' => 'required',
        ]);
        $data = $this->followupService->store($validated);
        return response()->json(['status' => 'success', 'message' => 'Followup Added Successfully']);
    }

    public function checkLimit(Request $request)
    {
        $result = $this->followupService->checkLimit($request->empid, $request->rno);
        return response()->json($result);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $rno)
    {
        $data = $this->followupService->show($rno);
        return response()->json(['status' => 'success', 'data' => $data]);
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
    public function transferFollowups()
    {
        $data['followups'] = $this->followupService->fetchFollowups();
        $data['followto'] = $this->userService->fetchRm();
        return view('panel.Follow.transfer-follow-ups', $data);
    }
    public function transferFollowupsStore(Request $request)
    {
        $result = $this->followupService->transferFollowupsStore($request);
        if ($result) {
            return back()->with('success', 'Fllowups successfully.');
        } else {
            return back()->with('error', 'Error: Contact System Admin.');
        }
    }
}
