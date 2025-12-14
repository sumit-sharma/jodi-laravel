<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileMoreInfoRequest;
use App\Models\CounterNumber;
use App\Models\ProfileMoreInfo;
use App\Services\CustomerService;
use App\Services\MiscService;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{

    protected $customerService, $searchService;
    /**
     * constructor of class
     *
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService, SearchService $searchService)
    {
        $this->customerService = $customerService;
        $this->searchService   = $searchService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['customers'] = $this->customerService->index($request);
        if ($request->expectsJson()) {
            return response()->json(['status' => 'success', 'data' => $data]);
        }
        // return view('panel.Customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['castes'] = MiscService::getCasteData(1);

        $data['incomes']       = MiscService::getTableData('incomes', ['inc_code', 'income']);
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        $data['countries']     = MiscService::getTableData('countries', ['country'], 'country');
        $data['nationalities'] = MiscService::getTableData('nationality', ['nationality']);
        $data['zones']         = MiscService::getTableData('zones', ['zone_code', 'zone_name'], 'zone_name');

        // $data['subcastes']        = MiscService::getDistinctData('profile_bio', 'subcaste' );
        // $data['gotras']           = MiscService::getDistinctData('profile_bio', 'gotra');
        // $data['hobbies']          = MiscService::getDistinctData('profile_personal', 'hobbies');
        // $data['characteristics']  = MiscService::getDistinctData('profile_personal', 'characteristics');
        // $data['rcities']          = MiscService::getDistinctData('profile_personal', 'rcity');
        // $data['familynatives']    = MiscService::getDistinctData('profile_personal', 'familynative');
        // $data['locations']        = MiscService::getDistinctData('profile_personal', 'arealocation');
        // $data['cities']           = MiscService::getDistinctData('profile_personal', 'contactcity');
        // $data['states']           = MiscService::getDistinctData('profile_personal', 'contactstate');
        // $data['contactrelations'] = MiscService::getDistinctData('profile_personal', 'contactrelation');

        return view('panel.Data.new_entry', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['_token']);
            $rno                 = CounterNumber::nextNumber('NP');
            $profileBio          = $this->customerService->saveProfileBio($rno, $data);
            $profilePersonal     = $this->customerService->saveProfilePersonal($rno, $data);
            $profileEducation    = $this->customerService->saveProfileEducation($rno, $data);
            $profileOrganisation = $this->customerService->saveProfileOrganisation($rno, $data);
            $profileBS           = $this->customerService->saveProfileBS($rno, $data);
            $ViewProfile         = $this->customerService->saveViewProfile($rno, $data);
            DB::commit();
            return redirect()->route('search-data', ['searchinfield' => 'rno', 'searchvalue' => $rno])->with('success', 'Profile has been created with Reference Number:' . $rno . ' successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile()]);
            // dd($th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile());
            // return back()->with('error', $th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $rno)
    {
        $data['castes']        = MiscService::getCasteData(1);
        $data['incomes']       = MiscService::getTableData('incomes', ['inc_code', 'income']);
        $data['occupations']   = MiscService::getTableData('occupations', ['occ_code', 'name']);
        $data['countries']     = MiscService::getTableData('countries', ['country'], 'country');
        $data['nationalities'] = MiscService::getTableData('nationality', ['nationality']);
        $data['zones']         = MiscService::getTableData('zones', ['zone_code', 'zone_name'], 'zone_name');

        $data['customer'] = $this->searchService->searchByrno($rno);
        // dd($data['customer']);
        return view('panel.Customer.edit_profile', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $rno)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['_token']);
            $profileBio          = $this->customerService->saveProfileBio($rno, $data);
            $profilePersonal     = $this->customerService->saveProfilePersonal($rno, $data);
            $profileEducation    = $this->customerService->saveProfileEducation($rno, $data);
            $profileOrganisation = $this->customerService->saveProfileOrganisation($rno, $data);
            $profileBS           = $this->customerService->saveProfileBS($rno, $data);
            $ViewProfile         = $this->customerService->saveViewProfile($rno, $data);
            DB::commit();

            return redirect()->route('search-data', ['searchinfield' => 'rno', 'searchvalue' => $rno])->with('success', 'Profile has been updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile());
            return back()->with('error', $th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $path     = $request->file('file')->store('uploads/customer', 'public');
            $filename = explode('uploads/customer/', $path)[1];
            $result   = $this->customerService->storesnap(['rno' => $request->rno, 'photo' => $filename, 'sorting' => 0]);

            return response()->json(['status' => 'success', 'data' => $result]);
        }
        return response()->json(['status' => 'error', 'message' => 'No file uploaded'], 400);
    }

    public function uplodPics(Request $request, $rno)
    {
        $data['rno']   = $rno;
        $data['snaps'] = $this->customerService->getSnaps($rno);
        return view('panel.Customer.photo-upload', $data);
    }

    public function deleteFile(Request $request)
    {
        $result = $this->customerService->deletesnap(['rno' => $request->rno, 'photo' => $request->photo]);
        Storage::disk('public')->delete('uploads/customer/' . $request->photo);
        return response()->json(['status' => 'success', 'message' => "file has been deleted"]);
    }

    public function viewAddMoreInfo(Request $request, $rno)
    {
        $data['rno']       = $rno;
        $data['bio']       = MiscService::getTableData('profile_bio', ['rno', 'refname'], 'rno', 'asc', "rno =  $rno")->first();
        $data['employees'] = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");
        $data['moreInfo'] = $this->customerService->fetchProfileMoreInfo($rno) ?? new ProfileMoreInfo;
        return view('panel.Customer.add_more_info', $data);
    }

    public function saveMoreInfo(StoreProfileMoreInfoRequest $request)
    {
        $data   = $request->validated();
        $result = $this->customerService->saveProfileMoreInfo($data);
        if ($result) {
            return redirect()->route('add-more-info', ['rno' => $data['rno']])->with('success', 'Profile More Info has been saved');
        }
        return back()->with('error', 'There are some error, please try again!');
    }

    public function storeInteraction(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $result = $this->customerService->storeInteraction($data);
        if ($result) {
            return response()->json(['status' => 'success', 'message' => 'Interaction has been saved successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'There are some error, please try again!']);
    }

    public function storeMeeting(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $result = $this->customerService->storeMeeting($data);
        if ($result) {
            return response()->json(['status' => 'success', 'message' => 'Meeting has been saved successfully']);
        }
        return response()->json(['status' => 'error', 'message' => 'There are some error, please try again!']);
    }

    public function pickListBioData(Request $request)
    {
        $data = $this->customerService->pickListBioData($request, ['id', 'rno', 'refname', 'gender']);
        if ($request->expectsJson()) {
            $formattedData = $data->getCollection()->transform(function ($item) {
                return [
                    'id'   => $item->rno,
                    'text' => $item->rno . ' - ' . $item->refname,
                    'gender' => $item->gender,
                ];
            });

            return response()->json([
                'results'    => $formattedData,
                'pagination' => [
                    'more' => $data->hasMorePages()
                ]
            ]);
        }
    }
}
