<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Advtdata;
use App\Models\CounterNumber;
use App\Services\AdvtService;
use App\Services\MiscService;
use Illuminate\Http\Request;

class AdvtdataController extends Controller
{
    protected $advtService;
    public function __construct(AdvtService $advtService)
    {
        $this->advtService = $advtService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 20, 'page' => $request->page ?? 1]);
        $data['advtdatas'] = $this->advtService->index($request);
        return view('panel.Data.show-advt-data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['action'] = 'Add';
        $data['advtdata'] = new Advtdata;
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");
        return view('panel.Data.add-advt-data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'matchfor' => 'required',
            'age' => 'required',
            'hght' => 'required',
            'community' => 'required',
            'education' => 'required',
            'occupation' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'remarks' => 'required',
            'assignto' => 'required',
        ]);
        $data = $validate;
        $data['empid'] = auth()->user()->username;
        $data['edate'] = now()->format('Y-m-d');

        $rno = CounterNumber::nextNumber('AD');
        $result = $this->advtService->saveAdvtData($rno, $data);
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Advt Data Added Successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Advt Data Not Added',
            ]);
        }
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
