<?php

namespace App\Services;

use App\Models\ProfileMatch;
use App\Models\ViewProfile;
use App\Traits\CommonTrait;

class MatchService
{
    use CommonTrait;

    public function getSingleCustMatchPrefrences($rno)
    {
        return  ProfileMatch::where('rno', $rno)->first();
    }

    public function load_search($data = [],  $page = 1, $per_page = null)
    {
        $query = ProfileMatch::query();
        if (!empty($data)) {
            $query = $query->where($data);
        }

        if ($per_page) {
            return $query->limit($per_page)->paginate($page);
        }

        return $query->get();
    }


    public function saveMatchPrefrence($rno, $data)
    {
        return ProfileMatch::updateOrCreate(['rno' => $rno], $data);
    }

    public function searchMatchList($input)
    {
        // dump($input);
        $query = ViewProfile::with([
            'personal',
            'bio',
            'occupation',
            'income',
            // 'education',
            // 'organisation',
            // 'payment',
            'personal.zone'
        ]);

        // if (isset($input['agefrom']) && isset($input['ageupto'])) {
        //     $query = $query->whereBetween('y', [$input['agefrom'], $input['ageupto']]);
        // }
        // if (isset($input['hghtfrom']) && isset($input['hghtto'])) {
        //     $hghtfrom = self::convertcmtoft($input['hghtfrom']);
        //     $hghtto = self::convertcmtoft($input['hghtto']);
        //     $query = $query->whereBetween('hg', [$hghtfrom, $hghtto]);
        // }
        $query->when(isset($input['gender']), function ($query) use ($input) {
            $query->where('g', '!=', $input['gender']);
        });

        $query->when(isset($input['religion']), function ($query) use ($input) {
            $query->whereIn('rl', $input['religion']);
        });

        $query->when(isset($input['caste']), function ($query) use ($input) {
            $query->whereHas('bio', fn($q) => $q->whereIn('caste', $input['caste']));
        });

        $query->when(isset($input['zonepref']), function ($query) use ($input) {
            $query->whereHas('personal', fn($q) => $q->whereIn('contactzone', $input['zonepref']));
        });

        $query->when(isset($input['education']), function ($query) use ($input) {
            $query->where('ed', '>=', $input['education']);
        });

        $query->when(isset($input['eatingpref']), function ($query) use ($input) {
            $query->whereIn('eh', $input['eatingpref']);
        });

        $query->when(isset($input['astropref']), function ($query) use ($input) {
            $query->whereIn('ast', $input['astropref']);
        });

        $query->when(isset($input['rspref']), function ($query) use ($input) {
            $query->whereIn('rs', $input['rspref']);
        });

        $query->when(isset($input['mspref']), function ($query) use ($input) {
            $query->whereIn('ms', $input['mspref']);
        });

        $query->when(isset($input['childpref']), function ($query) use ($input) {
            if ($input['childpref'] == '0') {
                $query->where('ch',  0);
            } else {
                $query->where('ch', '>=', 1);
            }
        });

        $query->when(isset($input['incomepref']), function ($query) use ($input) {
            $query->where('pi', '>=', $input['incomepref']);
        });

        // $query->when(isset($input['familyincomepref']), function ($query) use ($input) {
        //     $query->where('fi', '>=', $input['familyincomepref']);
        // });

        $query->when(isset($input['occupref']), function ($query) use ($input) {
            $query->whereIn('oc', $input['occupref']);
        });


        $query->when(isset($input['budget']), function ($query) use ($input) {
            $query->whereHas('personal', fn($q) => $q->where('budget', '>=', $input['budget']));
        });

        // TODO: mail reminder to implemented later when table got imported

        return $query->paginate(10);
    }


    // public function searchMatch($input)
    // {
    //     // Extract variables from input with defaults
    //     $religion         = $input['religion'] ?? [];
    //     $caste            = $input['caste'] ?? [];
    //     $zone             = $input['zone'] ?? [];
    //     $education        = $input['education'] ?? 0;
    //     $eatingpref       = $input['eatingpref'] ?? [];
    //     $astropref        = $input['astropref'] ?? [];
    //     $rspref           = $input['rspref'] ?? [];
    //     $mspref           = $input['mspref'] ?? [];
    //     $childpref        = $input['childpref'] ?? '';
    //     $incomepref       = $input['incomepref'] ?? '';
    //     $familyincomepref = $input['familyincomepref'] ?? '';
    //     $occupref         = $input['occupref'] ?? [];
    //     $budget           = $input['budget'] ?? 0;
    //     $dtype            = $input['dtype'] ?? [];
    //     // Match specific variables
    //     $matchrno   = $input['matchrno'] ?? '';
    //     $gender     = $input['g'] ?? '';
    //     $agefrom    = $input['agefrom'] ?? 18;
    //     $ageupto    = $input['ageupto'] ?? 40;
    //     $hghtfrom   = $input['hghtfrom'] ?? 0;
    //     $hghtto     = $input['hghtto'] ?? 12; // default high value

    //     $query = ViewProfile::query()
    //         ->select([
    //             'viewprofile.rno',
    //             'viewprofile.g',
    //             'viewprofile.refname',
    //             'profile_bio.dob',
    //             'viewprofile.y',
    //             'viewprofile.rl',
    //             'viewprofile.cst',
    //             'viewprofile.hghtft',
    //             'viewprofile.ast',
    //             'viewprofile.ed',
    //             'viewprofile.ms',
    //             'viewprofile.rs',
    //             'profile_personal.arealocation',
    //             'occupations.occupation',
    //             'incomes.income',
    //             'profile_personal.budget',
    //             'viewprofile.tc',
    //             'viewprofile.mc',
    //             'viewprofile.rm',
    //             'viewprofile.last_call',
    //             'viewprofile.last_mail',
    //             'viewprofile.last_mtng',
    //             'viewprofile.dtype',
    //             'viewprofile.status',
    //             'viewprofile.ost',
    //             'viewprofile.vc',
    //             'viewprofile.op'
    //         ])
    //         ->join('profile_personal', 'viewprofile.rno', '=', 'profile_personal.rno')
    //         ->join('profile_bio', 'profile_bio.rno', '=', 'viewprofile.rno')
    //         ->leftJoin('occupations', 'occupations.occ_code', '=', 'viewprofile.oc')
    //         ->leftJoin('incomes', 'incomes.inc_code', '=', 'viewprofile.fi')
    //         ->where('viewprofile.status', 'A');

    //     // Filter by dtype
    //     if (!empty($dtype)) {
    //         // If $dtype is string comma separated
    //         if (is_string($dtype)) {
    //             $dtype = explode(',', $dtype);
    //         }
    //         $query->whereIn('viewprofile.dtype', $dtype);
    //     }

    //     // Apply Filters
    //     if (!empty($religion)) {
    //         if (is_string($religion)) $religion = explode(',', $religion);
    //         $query->whereIn('viewprofile.rl', $religion);
    //     }

    //     if (!empty($caste)) {
    //         if (is_string($caste)) $caste = explode(',', $caste);
    //         // Fetch caste names from IDs if needed, assuming input is IDs but viewprofile.cst has names
    //         // Code snippet says: select caste from cst vs sno in ($caste)
    //         $casteNames = Caste::whereIn('id', $caste)->pluck('name')->toArray();
    //         $query->whereIn('viewprofile.cst', $casteNames);
    //     }

    //     if (!empty($zone)) {
    //         if (is_string($zone)) $zone = explode(',', $zone);
    //         $query->whereIn('profile_personal.contactzone', $zone);
    //     }

    //     // Education minimum
    //     if ($education) {
    //         $query->where('viewprofile.ed', '>=', $education);
    //     }

    //     if (!empty($eatingpref)) {
    //         if (is_string($eatingpref)) $eatingpref = explode(',', $eatingpref);
    //         $query->whereIn('viewprofile.eh', $eatingpref);
    //     }
    //     if (!empty($astropref)) {
    //         if (is_string($astropref)) $astropref = explode(',', $astropref);
    //         $query->whereIn('viewprofile.ast', $astropref);
    //     }
    //     if (!empty($rspref)) {
    //         if (is_string($rspref)) $rspref = explode(',', $rspref);
    //         $query->whereIn('viewprofile.rs', $rspref);
    //     }
    //     if (!empty($mspref)) {
    //         if (is_string($mspref)) $mspref = explode(',', $mspref);
    //         $query->whereIn('viewprofile.ms', $mspref);
    //     }

    //     if ($incomepref) {
    //         $query->where('viewprofile.pi', '>=', $incomepref);
    //     }
    //     if ($familyincomepref) {
    //         $query->where('viewprofile.fi', '>=', $familyincomepref);
    //     }

    //     if (!empty($occupref)) {
    //         if (is_string($occupref)) $occupref = explode(',', $occupref);
    //         $query->whereIn('viewprofile.oc', $occupref);
    //     }
    //     // $childpref is not used in snippet? Logic missing.

    //     if ($budget > 0) {
    //         $query->where('profile_personal.budget', '>=', $budget);
    //     }

    //     // Match Logic
    //     // Age range, Height range
    //     $query->whereBetween('viewprofile.y', [$agefrom, $ageupto]);
    //     $query->whereBetween('viewprofile.hg', [$hghtfrom, $hghtto]);

    //     if (!empty($matchrno)) {
    //         // Exclude already matched in clientsl
    //         $query->where('viewprofile.g', '<>', $gender);

    //         $excludedRnos = DB::table('clientsl')->where('rno', $matchrno)->pluck('proposal')
    //             ->merge(DB::table('clientsl')->where('proposal', $matchrno)->pluck('rno'));

    //         $query->whereNotIn('viewprofile.rno', $excludedRnos);

    //         // Also exclude self? Usually implicit by gender, but safe to add
    //         $query->where('viewprofile.rno', '<>', $matchrno);
    //     } else {
    //         // If no matchrno, maybe just filtering general?
    //         // Snippet says: v.g='$g'
    //         if ($gender) {
    //             $query->where('viewprofile.g', $gender);
    //         }
    //     }

    //     // Sorting
    //     $query->orderByDesc('profile_bio.profiledate');

    //     return $query->paginate(20, ['*'], 'page', $input['page'] ?? 1);
    // }    
}
