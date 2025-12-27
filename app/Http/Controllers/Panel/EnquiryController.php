<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{

    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $viewData = false)
    {
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $result = $this->customerService->getEnquiryList($request);
        if (!$viewData) {
            return $result;
        }
        return view('panel.Customer.enquiry-list', compact('result'));
    }

    /**
     * enquiry list  
     */
    public function enquiryList(Request $request, $rno)
    {
        $request->merge(['rno' => $rno]);
        $enquiries = $this->index($request, false);
        return view('panel.Customer.enquiry-list', compact('enquiries', 'rno'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data   = $request->all();
        unset($data['_token']);
        $data['empid'] = auth()->user()->username;
        $data['status'] = 0;
        $result = $this->customerService->storeEnquiry($data);
        if (isset($result->id)) {
            return response()->json([
                'status' => 'success',
                'message' => 'Enquiry added successfully',
                'data' => $result,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Enquiry added failed',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $rno)
    {
        $result = $this->customerService->getEnquiry($rno);
        return response()->json([
            'status' => 'success',
            'message' => 'Enquiry fetched successfully',
            'data' => $result,
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
}
