<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class FinanceController extends Controller
{

    public function __construct(private CustomerService $customerService)
    {
        $this->customerService = $customerService;
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
        try {
            $addPayment = $this->customerService->addPayment($request->all());
            if ($addPayment) {
                return response()->json(['status' => 'success', 'message' => 'Payment added successfully']);
            }
            return response()->json(['status' => 'error', 'message' => 'Failed to add payment']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to add payment' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $rno)
    {
        $data['rno'] = $rno;
        $data['profile'] = $this->customerService->fetchProfileDetail($rno);
        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'View finance data fetched successfully',
                'data' => $data['profile']
            ]);
        }
        return view('panel.Customer.finance.view-finance', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    //
    {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rno, $id)
    {
        try {
            $delete = $this->customerService->deletePayment($rno, $id);
            if ($delete) {
                return response()->json(['status' => 'success', 'message' => 'Payment deleted successfully']);
            }
            return response()->json(['status' => 'error', 'message' => 'Failed to delete payment']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete payment' . $e->getMessage()]);
        }
    }


    public function getPaymentList(Request $request)
    {
        try {
            $passcode = $this->customerService->checkPasscode((string) $request->password);
            if (!$passcode) {
                return response()->json(['status' => 'error', 'message' => 'Invalid passcode']);
            }
            if ($passcode->status == 0) {
                return response()->json(['status' => 'error', 'message' => 'Passcode has been already expired']);
            }

            $data['payments'] = $this->customerService->getPaymentList($request->rno);
            return response()->json(['status' => 'success', 'message' => 'Payment list fetched successfully', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to fetch payment list' . $e->getMessage()]);
        }
    }
}
