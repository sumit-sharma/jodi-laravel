<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\MasterService;
use App\Services\MiscService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    protected $masterService;

    public function __construct(MasterService $masterService)
    {
        $this->masterService = $masterService;
    }

    public function viewCasteManager(Request $request)
    {
        $data['castes'] = MiscService::getCasteData(1);
        return view('panel.main.caste-options', $data);
    }

    public function checkExists(Request $request): JsonResponse
    {
        $result = MiscService::checkExists($request->table, $request->whereArray);
        return response()->json((bool)!$result);
    }

    public function storeCaste(Request $request)
    {
        $request->validate([
            'religion' => 'required|integer',
            'caste'    => 'required|string|max:100|unique:castes,name',
        ]);

        $result = $this->masterService->storeCaste($request->religion, $request->caste);

        if ($result) {
            return redirect()->route('manage-caste')->with('success', 'Caste ' . $request->caste . ' had been added successfully.');
        } else {
            return redirect()->route('manage-caste')->with('error', 'some error occurred, please try again.');
        }
    }

    public function viewZoneManager(Request $request)
    {
        $data['zones']         = MiscService::getTableData('zones', ['zone_code', 'zone_name'], 'zone_name');
        return view('panel.main.zone-options', $data);
    }

    public function storeZone(Request $request)
    {
        $request->validate([
            'zone_name' => 'required|string|max:100|unique:zones,zone_name',
        ]);

        $result = $this->masterService->storeZone($request->zone_name);

        if ($result) {
            return redirect()->route('manage-zone')->with('success', 'Zone ' . $request->zone_name . ' had been added successfully.');
        } else {
            return redirect()->route('manage-zone')->with('error', 'some error occurred, please try again.');
        }
    }

    public function viewOccupationManager(Request $request)
    {
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        return view('panel.main.occupation-options', $data);
    }

    public function storeOccupation(Request $request)
    {
        $request->validate([
            'occupation' => 'required|string|max:100|unique:occupations,name',
        ]);

        $result = $this->masterService->storeOccupation($request->occupation);

        if ($result) {
            return redirect()->route('manage-occupation')->with('success', 'Occupation ' . $request->occupation . ' had been added successfully.');
        } else {
            return redirect()->route('manage-occupation')->with('error', 'some error occurred, please try again.');
        }
    }
}
