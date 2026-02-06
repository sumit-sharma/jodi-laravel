<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Services\MiscService;
use App\Services\ReportService;

class ReportController extends Controller
{
    protected $customerService, $reportService;
    public function __construct(CustomerService $customerService, ReportService $reportService)
    {
        $this->customerService = $customerService;
        $this->reportService = $reportService;
    }

    public function meetingReport(Request $request)
    {
        $request->merge(['page' => $request->page ?? 1, 'limit' => $request->limit ?? 25, 'dtype' => 'P,N']);
        $data['meetings'] = $this->reportService->getMeetingsReport($request);
        return view('panel.reports.meeting-report', $data);
    }

    public function noTouchReport(Request $request)
    {
        $filterArray = ['page' => $request->page ?? 1, 'limit' => $request->limit ?? 25];
        $filterArray['status'] = $request->status ?? 'A';
        $filterArray['ntp'] = $request->ntp ?? 7;
        $filterArray['nts'] = $request->nts ?? 2;
        $filterArray['dtype'] = $request->dtype ?? 'P';
        $request->merge($filterArray);
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");
        $data['noTouch'] = $this->reportService->getNoTouchReport($request);
        return view('panel.reports.no-touch-report', $data);
    }


    public function attendanceReport(Request $request)
    {
        $request->merge(['page' => $request->page ?? 1, 'limit' => $request->limit ?? 25]);
        $data['viewtype'] = $request->viewtype ?? 'view';
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc');
        if ($request->filled('start_date')) {
            $data['attendances'] = $this->reportService->getAttendanceData($request);
        }
        return view('panel.reports.attendance-report', $data);
    }

    public function noMeetingReport(Request $request)
    {
        $request->merge([
            'page'   => $request->page ?? 1,
            'limit'  => $request->limit ?? 25,
            'status' => 'A',
            'ost'    => '',
            'ntp'    => $request->ntp ?? 7,
            'dtype'  => $request->dtype ?? 'P',
        ]);
        $data['noMeetings'] = $this->reportService->getNoMeetingsReport($request);
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");
        return view('panel.reports.no-meeting-report', $data);
    }

    public function editLogReport(Request $request)
    {
        $request->merge([
            'page'   => $request->page ?? 1,
            'limit'  => $request->limit ?? 25,
            'status' => 'A',
            'ost'    => '',
            'ntp'    => $request->ntp ?? 7,
            'dtype'  => $request->dtype ?? 'P',
        ]);
        $data['editLogReports'] = $this->reportService->getEditDataLogsReport($request);
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc');
        return view('panel.reports.edit-log-report', $data);
    }

    public function myFutureCalls(Request $request)
    {
        $request->merge([
            'page'   => $request->page ?? 1,
            'limit'  => $request->limit ?? 25,
        ]);
        $data['TableData'] = $this->reportService->getMyFutureCalls($request);
        return view('panel.reports.future-calls', $data);
    }

    public function myFutureMails(Request $request)
    {
        $request->merge([
            'page'   => $request->page ?? 1,
            'limit'  => $request->limit ?? 25,
        ]);
        $data['TableData'] = $this->reportService->getMyTodaysMails($request);
        return view('panel.reports.future-mails', $data);
    }

    public function getFollowupAutoLogsReport(Request $request)
    {
        $request->merge([
            'page'   => $request->page ?? 1,
            'limit'  => $request->limit ?? 25,
        ]);
        $data['TableData'] = $this->reportService->getFollowupAutoLogs($request);
        return view('panel.reports.followup-autolog-report', $data);
    }

    public function getFinanceReport(Request $request)
    {
        $request->merge([
            'page'   => $request->page ?? 1,
            'limit'  => $request->limit ?? 25,
        ]);
        $data['TableData'] = $this->reportService->getFinanceReport($request);
        return view('panel.reports.finance-report', $data);
    }
}
