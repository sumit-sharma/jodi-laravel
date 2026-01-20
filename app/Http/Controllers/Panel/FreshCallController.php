<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\FreshCallService;
use Illuminate\Http\Request;

class FreshCallController extends Controller
{
    protected $freshCallService;
    public function __construct(FreshCallService $freshCallService)
    {
        $this->freshCallService = $freshCallService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data[''] = $this->freshCallService->index($request);
        // return view('panel.fresh-call.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.Services.fresh-calls');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'callsource' => 'required',
            'noofcalls' => 'required',
            'callsconnected' => 'required',
            'followupcalls' => 'required',
        ]);
        $validated['empid'] = $request->empid ?? auth()->user()->username;
        $validated['dated'] = $request->dated ?? date('Y-m-d');
        $result = $this->freshCallService->store($validated);
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Fresh Call Added Successfully',
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong',
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
}
