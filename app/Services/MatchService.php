<?php
namespace App\Services;

use App\Models\ProfileMatch;

class MatchService
{

    public function getSingleCustMatchPrefrences($rno)
    {
        return  ProfileMatch::where('rno', $rno)->first();
    }

    public function load_search($data = [],  $page = 1, $per_page = null)
    {
        $query = ProfileMatch::query();
        if(!empty($data)){
            $query = $query->where($data);
        }

        if($per_page){
            return $query->limit($per_page)->paginate($page);
        }

        return $query->get();
    }


    public function saveMatchPrefrence($rno, $data)
    {
        return ProfileMatch::updateOrCreate(['rno' => $rno], $data);
    }





}
