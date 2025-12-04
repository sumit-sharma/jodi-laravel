<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchPrefrenceRequest;
use App\Models\ProfileMatch;
use App\Services\MatchService;
use App\Services\MiscService;

class MatchController extends Controller
{
    protected $matchService;
    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    public function viewUpdateMatchPrefrences($rno)
    {
        $incomes         = MiscService::getTableData('incomes', ['inc_code', 'income']);
        $occupations     = MiscService::getTableData('occupations', ['occ_code', 'name'], 'occ_code');
        $eduprefs        = MiscService::getTableData('edupref', ['sno', 'education']);
        $zones           = MiscService::getTableData('zones', ['zone_code', 'zone_name'], 'zone_name', 'asc', "zone_name <> ''");
        $bio             = MiscService::getTableData('profile_bio', ['rno', 'refname'], 'rno', 'asc', "rno =  $rno")->first();
        $matchPrefrences = $this->matchService->getSingleCustMatchPrefrences($rno) ?? new ProfileMatch;
        return view('panel.Customer.user-match-prefrence', compact('matchPrefrences', 'rno', 'incomes', 'occupations', 'eduprefs', 'zones', 'bio'));
    }

    public function saveMatchPrefrences(MatchPrefrenceRequest $request, int $rno)
    {
        $validate_data = $request->validated();
        $validate_data['religion'] = implode(',',$request->religion);
        $validate_data['caste'] = implode(',',$request->caste);
        $validate_data['edupref'] = implode(',',$request->edupref);
        $validate_data['eatingpref'] = implode(',',$request->eatingpref);
        $validate_data['astropref'] = implode(',',$request->astropref);
        $validate_data['rspref'] = implode(',',$request->rspref);
        $validate_data['mspref'] = implode(',',$request->mspref);
        $validate_data['occupref'] = implode(',',$request->occupref);
        $validate_data['zonepref'] = implode(',',$request->zonepref);
        $validate_data['mr'] = implode(',',$request->mr);
        // dump($validate_data);
        $result =  $this->matchService->saveMatchPrefrence($rno, $validate_data);
        return back()->with('success', 'Match prefrences updated ');
    }

}
