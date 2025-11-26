<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\CounterNumber;
use App\Services\CustomerService;
use App\Services\MiscService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    protected $customerService;
    /**
     * constructor of class
     *
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            $rno        = CounterNumber::nextNumber('NP');
            $profileBio = $this->customerService->saveProfileBio($rno, $data);
            $profilePersonal = $this->customerService->saveProfilePersonal($rno, $data);
            $profileEducation = $this->customerService->saveProfileEducation($rno, $data);
            $profileOrganisation = $this->customerService->saveProfileOrganisation($rno, $data);
            $profileBS = $this->customerService->saveProfileBS($rno, $data);
            $ViewProfile = $this->customerService->saveViewProfile($rno, $data);
            DB::commit();
            return response()->json([
                'data' => $data,
                'profileBio' => $profileBio,
                'profilePersonal' => $profilePersonal,
                'profileEducation' => $profileEducation,
                'profileOrganisation' => $profileOrganisation,
                'profileBS' => $profileBS,
                'ViewProfile' => $profileBS,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile());
            return back()->with('error', $th->getMessage() . ' on Line ' . $th->getLine() . ' on file ' . $th->getFile());

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
            $path = $request->file('file')->store('uploads/customer', 'public');
            return response()->json(['path' => $path]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }

}
