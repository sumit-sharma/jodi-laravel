<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CustomerService;

class ReportController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function meetingReport(Request $request)
    {
        $request->merge(['page' => $request->page ?? 1, 'limit' => $request->limit ?? 25]);
        $data['meetings'] = $this->customerService->getMeetings($request);
        return view('panel.reports.meeting-report', $data);
    }
}
