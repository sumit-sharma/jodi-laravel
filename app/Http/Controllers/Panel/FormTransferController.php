<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\FormTransferService;
use Illuminate\Http\Request;

class FormTransferController extends Controller
{

    protected $formTransferService;
    public function __construct(FormTransferService $formTransferService)
    {
        $this->formTransferService = $formTransferService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rno' => 'required',
            'assign_to' => 'required',
            'remarks' => 'required',
        ]);

        $formTransfer = $this->formTransferService->store($validated);
        return response()->json(['status' => 'success', 'message' => 'Form Transfer Created Successfully', 'data' => $formTransfer]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formTransfer = $this->formTransferService->show($id);
        return response()->json(['success' => 'success', 'message' => 'Form Transfer Fetched Successfully', 'data' => $formTransfer]);
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
