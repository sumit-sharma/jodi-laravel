<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\CounterNumber;
use App\Services\MiscService;
use App\Services\ReferenceService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ReferenceController extends Controller implements HasMiddleware
{

    private $referenceService;
    public function __construct(ReferenceService $referenceService)
    {
        $this->referenceService = $referenceService;
    }


    public static function middleware()
    {
        return [
            new Middleware('permission:View All References', ['index']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->limit = $request->limit ?? 30;
        $request->page = $request->page ?? 1;
        $references = $this->referenceService->index($request);
        return view('panel.references.show-references', compact('references'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");
        return view('panel.references.add-references', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            $data['dated'] = now()->format('Y-m-d H:i:s');
            $data['refno'] = CounterNumber::nextNumber('RF');
            $data['empid'] = auth()->user()->username;
            $result = $this->referenceService->store($data);
            // dd($result);
            if ($result) {
                return response()->json(['status' => 'success', 'message' => 'Reference Number ' . $result->refno . ' has been created successfully']);
            }
            return response()->json(['status' => 'error', 'message' => 'Some error occurred while creating Reference Number ']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile()]);
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
        $data['reference'] = $this->referenceService->show($id);
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");
        return view('panel.references.edit-references', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            $data['dated'] = now()->format('Y-m-d H:i:s');
            $result = $this->referenceService->update($data, $id);
            if ($result) {
                return response()->json(['status' => 'success', 'message' => 'Reference has been updated successfully']);
            }
            return response()->json(['status' => 'error', 'message' => 'Some error occurred while updating Reference Number ']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
