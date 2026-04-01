<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use App\Services\MiscService;
use Illuminate\Http\Request;

class HideMemberController extends Controller
{
    protected $customerService;
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
     * Display the specified resource.
     */
    public function show(string $rno)
    {
        $vp = MiscService::getTableData('viewprofile', ['rno', 'dtype'], 'rno', 'asc', "rno =  $rno")->first();

        if (in_array($vp->dtype, ['N', 'P'])) {
            $responseTxt = 'hide';
        } elseif ($vp->dtype == 'H') {
            $responseTxt = 'unhide';
        } else {
            $responseTxt = 'na';
        }
        return response()->json([
            'status' => 'success',
            'message' => 'success',
            'data' => ['dtype' => $vp->dtype, 'text' => $responseTxt]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $rno)
    {
        $message = 'There are some error, please try again!';
        $status = 'error';
        $result = $this->customerService->toggleHideMember($rno);
        if ($result) {
            switch ($result) {
                case 'na':
                    $message = "Not eligible for hide/unhide operation";
                    break;
                default:
                    $message = "Member has been changed to {$result} successfully";
                    $status = 'success';
                    break;
            }
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
