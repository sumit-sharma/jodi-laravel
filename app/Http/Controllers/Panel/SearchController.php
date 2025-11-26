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
        return view('panel.Services.SearchMembers');
    }

    public function searchData(Request $request)
    {
        try {

            $data = $request->all();
            unset($data['_token']);
            $results = $this->searchService->search(
                $data,
                $request->get('per_page', 20)
            );

            if ($request->expectsJson()) {
                return response()->json($results);
            }

            $searchLog = $this->searchService->saveSearchLog($data);

            return view('panel.Services.SearchMembersResult', compact('results'));

        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }

    }

}
