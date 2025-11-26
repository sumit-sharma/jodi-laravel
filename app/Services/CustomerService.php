<?php
namespace App\Services;

use App\Models\ProfileBio;
use App\Models\ProfileBs;
use App\Models\ProfileEducation;
use App\Models\ProfileOrganisation;
use App\Models\ProfilePersonal;
use App\Models\Viewprofile;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class CustomerService
{

    public function saveProfileBio($rno, $data)
    {
        $columns                    = ["gender", "refname", "dob", "tob", "age", "pob", "religion", "caste", "subcaste", "gotra", "hght", "hghtft", "wtkg", "complexion", "dd", "bg", "astrostatus", "drinkinghabit", "smokinghabit", "eatinghabit", "spects", "education", "occupation", "income", "rs", "ms"];
        $filterArray                = Arr::only($data, $columns);
        $filterArray["rno"]         = $rno;
        $filterArray["empid"]       = auth()->user()->id;
        $filterArray["dtype"]       = 'N';
        $filterArray["profiledate"] = now();
        return ProfileBio::create($filterArray);
    }

    public function saveProfilePersonal($rno, $data)
    {
        $columns            = ["visa", "rcity", "rcountry", "marriageinfo", "child", "childdetails", "familystatus", "fathersname", "mothersname", "fatherdetails", "motherdetails", "familyincome", "familyincomem", "typeoffamily", "familynative", "hobbies", "characteristics", "eyecolor", "haircolor", "salary", "budget", "nationality", "familyhistory", "contactperson", "contactaddress", "contactcity", "contactstate", "contactpincode", "contactcountry", "contactphone", "contactemail", "contactrelation", "personaldetails", "contactzone", "arealocation"];
        $filterArray        = Arr::only($data, $columns);
        $filterArray["rno"] = $rno;
        return ProfilePersonal::create($filterArray);
    }

    public function saveProfileEducation($rno, $data)
    {
        $course = $data['educourse'];
        $inst   = $data['eduinst'];
        $eyear  = $data['eduyear'];
        $items  = [];
        foreach ($course as $key => $value) {
            $items[] = [
                'rno'        => $rno,
                'educourse'  => $value,
                'eduinst'    => $inst[$key],
                'eduyear'    => $eyear[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return ProfileEducation::insert($items);

    }

    public function saveProfileOrganisation($rno, $data)
    {

        $orgname = $data['orgname'];
        $orgdept = $data['orgdept'];
        $orgyear = $data['orgyear'];
        $items   = [];
        foreach ($orgname as $key => $value) {
            $items[] = [
                'rno'        => $rno,
                'orgname'    => $value,
                'orgdept'    => $orgdept[$key],
                'orgyear'    => $orgyear[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return ProfileOrganisation::insert($items);
    }

    public function saveProfileBS($rno, $data)
    {

        $bsname     = $data['bsname'];
        $bs         = $data['bs'];
        $bsage      = $data['bsage'];
        $bsmarriage = $data['bsmarriage'];
        $bsdetails  = $data['bsdetails'];
        $items      = [];
        foreach ($bsname as $key => $value) {
            $items[] = [
                'rno'        => $rno,
                'bsname'     => $value,
                'bs'         => $bs[$key],
                'bsage'      => $bsage[$key],
                'bsmarriage' => $bsmarriage[$key],
                'bsdetails'  => $bsdetails[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return ProfileBs::insert($items);

    }
    public function saveViewProfile($rno, $data)
    {
        $currentUserId         = auth()->user()->id;
        $diff                  = Carbon::parse($data['dob'])->diff(now());
        $columns               = ['refname', 'hghtft', 'rs', 'ms'];
        $filterArray           = Arr::only($data, $columns);
        $filterArray["rno"]    = $rno;
        $filterArray["g"]      = $data['gender'];
        $filterArray["y"]      = $diff->year;
        $filterArray["m"]      = $diff->month;
        $filterArray["rl"]     = $data['religion'];
        $filterArray["cst"]    = $data['caste'];
        $filterArray["hg"]     = $data['hght'];
        $filterArray['wt']     = $data['wtkg'];
        $filterArray['eh']     = $data['eatinghabit'];
        $filterArray['ast']    = $data['astrostatus'];
        $filterArray['ed']     = $data['education'];
        $filterArray['oc']     = $data['occupation'];
        $filterArray['pi']     = $data['income'];
        $filterArray['ch']     = $data['child'];
        $filterArray['fi']     = $data['familyincome'];
        $filterArray['tc']     = $currentUserId;
        $filterArray['mc']     = $currentUserId;
        $filterArray['rm']     = $currentUserId;
        $filterArray['p_sent'] = '0';
        $filterArray['dtype']  = 'N';
        $filterArray['status'] = 'A';
        $filterArray['ost']    = '';
        return Viewprofile::create($filterArray);
    }

}
