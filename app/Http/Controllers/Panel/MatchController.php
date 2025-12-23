<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchPrefrenceRequest;
use App\Models\ProfileMatch;
use App\Services\MatchService;
use App\Services\MiscService;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    protected $matchService;
    public function __construct(MatchService $matchService)
    {
        $this->matchService  = $matchService;
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
        $validate_data               = $request->validated();
        $validate_data['religion']   = \App\Traits\CommonTrait::chkArrayImplode($request->religion);
        $validate_data['caste']      = \App\Traits\CommonTrait::chkArrayImplode($request->caste);
        $validate_data['edupref']    = \App\Traits\CommonTrait::chkArrayImplode($request->edupref);
        $validate_data['eatingpref'] = \App\Traits\CommonTrait::chkArrayImplode($request->eatingpref);
        $validate_data['astropref']  = \App\Traits\CommonTrait::chkArrayImplode($request->astropref);
        $validate_data['rspref']     = \App\Traits\CommonTrait::chkArrayImplode($request->rspref);
        $validate_data['mspref']     = \App\Traits\CommonTrait::chkArrayImplode($request->mspref);
        $validate_data['occupref']   = \App\Traits\CommonTrait::chkArrayImplode($request->occupref);
        $validate_data['zonepref']   = \App\Traits\CommonTrait::chkArrayImplode($request->zonepref);
        $validate_data['mr']         = \App\Traits\CommonTrait::chkArrayImplode($request->mr);
        $result = $this->matchService->saveMatchPrefrence($rno, $validate_data);
        return back()->with('success', 'Match prefrences updated ');
    }

    public function findMatch(Request $request, $rno = null)
    {
        $data['rno'] = $rno ?? 0;
        $data['matchPrefrences'] = $this->matchService->getSingleCustMatchPrefrences($rno) ?? new ProfileMatch;
        $data['incomes']         = MiscService::getTableData('incomes', ['inc_code', 'income']);
        $data['occupations']     = MiscService::getTableData('occupations', ['occ_code', 'name'], 'occ_code');
        $data['eduprefs']        = MiscService::getTableData('edupref', ['sno', 'education']);
        $data['zones']           = MiscService::getTableData('zones', ['zone_code', 'zone_name'], 'zone_name', 'asc', "zone_name <> ''");
        return view('panel.Match.find-match', $data);
    }

    public function searchMatch(Request $request)
    {
        // info($request->all());
        $data = $this->matchService->searchMatchList($request->all());
        return response()->json(['status' => 'success', 'data' => $data]);
    }


    public function saveClientSL(Request $request)
    {
        $validate_data = $request->validate([
            'rno' => 'required',
            'proposal' => 'required',
        ]);
        $verify = $this->matchService->verifyClientSL($validate_data['rno'], $validate_data['proposal']);
        if ($verify) {
            return response()->json(['status' => 'error', 'message' => 'Client SL already exists']);
        }
        $result = $this->matchService->saveClientSL($validate_data);
        return response()->json(['status' => 'success', 'message' => 'Client SL saved successfully']);
    }


    public function clientSLList(Request $request, $rno)
    {
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 15);
        $conditions = [['rno', '=', $rno], ['status', '<>', 1]];
        $data['rno'] = $rno;
        $data['clientSLNotOkData'] = $this->matchService->getClientSLList($conditions);
        $data['clientSLData'] = $this->matchService->getClientSLList([['rno', '=', $rno]], $page, $limit);
        return view('panel.Match.client-sl-list', $data);
    }


    public function updateClientSL(Request $request, $id)
    {
        // dd($request->all());
        $validate_data = $request->validate([
            'status' => 'required',
            'remarks' => 'nullable',
        ]);
        $result = $this->matchService->updateClientSL($id, $validate_data);
        return response()->json(['status' => 'success', 'message' => 'Client SL updated successfully']);
    }
}
