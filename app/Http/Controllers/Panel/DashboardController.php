<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\MiscService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('panel.dashboard');
    }

    public function getCaste($religion)
    {
        $result = MiscService::getCasteData($religion);
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

}
