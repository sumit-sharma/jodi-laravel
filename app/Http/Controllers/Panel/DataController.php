<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\DataService;
use App\Services\MiscService;
use Illuminate\Http\Request;

class DataController extends Controller
{
    protected $dataService;
    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function showallotherdata(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['TableData'] = $this->dataService->showallotherdata($request, auth()->user()->username);
        $data['headings'] = "Show Other Data";
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        return view('panel.Data.show-other-data', $data);
    }


    public function showwebsiteData(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['TableData'] = $this->dataService->showwebsiteData($request);
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        $data['headings'] = "Show Website Data";
        return view('panel.Data.show-other-data', $data);
    }


    public function showdoneList(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        // $data['TableData'] = $this->dataService->showdoneList($request);
        $data['headings'] = "Show Done List";
        return view('panel.Data.show-other-data', $data);
    }

    public function showmyNaData(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['TableData'] = $this->dataService->showmyNaData($request, auth()->user()->username);
        $data['headings'] = "Show My NA Data";
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        return view('panel.Data.show-other-data', $data);
    }


    public function showallnonnadata(Request $request)
    {
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['TableData'] = $this->dataService->showallnonnadata($request, auth()->user()->username);
        $data['headings'] = "Show All Non NA Data";
        return view('panel.Data.show-other-data', $data);
    }
    public function sentpackage()
    {
        return view('panel.Data.sent-package');
    }
    public function wrongemail(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['wrongData'] = $this->dataService->bouncedEmail($request);
        return view('panel.Data.wrong-email', $data);
    }
    public function webdata(Request $request)
    {
        $request->merge(['limit' => $request->limit ?? 10, 'page' => $request->page ?? 1]);
        $data['TableData'] = $this->dataService->allWebsiteData($request);
        return view('panel.Data.web-data', $data);
    }

    public function toggleWebData($id)
    {
        $status = $this->dataService->toggleWebData($id);
        if ($status) {
            return response()->json(['status' => 'success', 'message' => 'Status updated successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
    }
}
