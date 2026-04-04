<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function searchMembers(Request $request)
    {
        $searchLogs = $this->searchService->getSearchLog();
        return view('panel.Services.SearchMembers', compact('searchLogs'));
    }

    public function searchData(Request $request)
    {
        try {
            if (empty($request->searchvalue)) {
                return redirect()->back()->with('error', 'Search Criteria/Value is required');
            }
            $data = $request->all();
            unset($data['_token']);
            $response = $this->searchService->search(
                $data,
                $request->get('per_page', 500),
                $request->get('cursor')
            );

            $results = $response['resultData'];
            $cacheKey = $response['cacheKey'];
            $total = $response['total'];

            if ($request->ajax()) {
                return response()->json([
                    'html' => view('panel.Services.partials._search_results_rows', compact('results', 'cacheKey'))->render(),
                    'next_cursor' => $results->nextCursor() ? $results->nextCursor()->encode() : null,
                    'hasMorePages' => $results->hasMorePages(),
                ]);
            }

            if ($request->expectsJson()) {
                return response()->json($results);
            }

            $searchLog = $this->searchService->saveSearchLog($data);
            $inputdata = $data;
            return view('panel.Services.SearchMembersResult', compact('results', 'inputdata', 'cacheKey', 'total'));
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
