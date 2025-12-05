<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\MiscService;
use App\Services\SearchService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private $searchService;
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index()
    {
        $data['searchLogs'] = $this->searchService->getSearchLog();
        return view('panel.dashboard', $data);
    }

    public function getCaste($religion)
    {
        $result = MiscService::getCasteData($religion);
        return response()->json(['data' => $result]);
    }


    public function fetchCastes(Request $request)
    {
        $result = MiscService::getCasteData($request->religion);
        return response()->json(['data' => $result]);
    }

    public function getDistinctData(Request $request)
    {
        $q = $request->q;
        if(!empty(trim($q))){
            $where = "{$request->column} LIKE '%{$q}%'";
        }
        return MiscService::getDistinctData($request->table, $request->column, $where ?? null);

    }

    public function getTableData(Request $request)
    {
        $where = $request->where ?? null;
        return MiscService::getTableData($request->table, $request->columns, $sortBy ??  'id', $sortOrder ?? 'asc',  $where);
    }

    public function pdfview($type, $rno)
    {
        switch ($type) {
            case 'fullbiodata':
                $view = 'pdf-views.full-biodata';
                break;
        }
        $data = $this->searchService->searchByrno($rno);
        // return view($view, compact('data'));
        $pdf = Pdf::loadView($view, compact('data'));
        $pdf->setPaper('A3', 'portrait');

        return $pdf->download('biodata_'.$rno.'_'.time().'.pdf');

    }



}
