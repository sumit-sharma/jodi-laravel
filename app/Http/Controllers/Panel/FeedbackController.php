<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use App\Services\MiscService;
use App\Services\SendMailService;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    private $customerService, $sendMailService;
    public function __construct(CustomerService $customerService, SendMailService $sendMailService)
    {
        $this->customerService = $customerService;
        $this->sendMailService = $sendMailService;
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


    public function store(Request $request)
    {
        $validated = $request->validate([
            'rno' => 'required',
            'proposal' => 'required',
            'fstatus'   => 'required',
            'feedback' => 'required',
        ], [
            'rno.required' => 'Rno is required',
            'proposal.required' => 'Proposal is required',
            'fstatus.required' => 'Feedback status is required',
            'feedback.required' => 'Feedback Details is required',
        ]);
        $validated['fby'] = auth()->user()->username;
        $result = $this->customerService->storeFeedback($validated);
        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Feedback saved successfully',
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Feedback unable to save',
        ]);
    }

    public function getFeedbackModal(Request $request)
    {
        $rno = $request->rno;
        $data['sendMailProposals'] = $this->sendMailService->sendMailProposals($rno, 1);
        $data['feedbackOptions'] = MiscService::getTableData('feedback_option', ['id', 'feedback']);
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
