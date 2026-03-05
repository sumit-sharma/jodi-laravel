<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\DailyMomentService;
use Illuminate\Http\Request;

class DailyMomentController extends Controller
{

    protected $dailyMomentService;

    public function __construct(DailyMomentService $dailyMomentService)
    {
        $this->dailyMomentService = $dailyMomentService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inputFilter = ['limit' => $request->limit ?? 30, 'page' => $request->page ?? 1];
        if (!auth()->user()->can('All Daily Moment')) {
            $inputFilter['empid'] = auth()->user()->username;
        }
        $request->merge($inputFilter);
        $data['dailyMoments'] = $this->dailyMomentService->index($request);
        return view('panel.Services.daily-moment', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dated' => 'required|date',
            'timefrom' => 'required|date_format:H:i',
            'timeto' => 'required|date_format:H:i',
            'moment' => 'required',
        ]);
        $result = $this->dailyMomentService->store($validated);
        if ($result) {
            return response()->json(['status' => 'success', 'message' => 'Daily Moment Added Successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Daily Moment Added Failed']);
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
}
