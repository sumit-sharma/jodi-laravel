<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    private $customerService;
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
        $result = $this->customerService->getFeedbackList($request);
        if (!$viewData) {
            return $result;
        }
        // return view('panel.Customer.enquiry-list', compact('result'));
    }
    /**
     * enquiry list  
     */
    public function feedbackList(Request $request, $rno)
    {
        return view('panel.Customer.feedback-list', compact('rno'));
    }

    public function fetchFeedbackByType(Request $request, $type, $rno)
    {

        $request->merge(['type' => $type, 'rno' => $rno, 'limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $feedbacks = $this->customerService->getFeedbackListByType($type, $request);
        return $feedbacks;
    }
}
