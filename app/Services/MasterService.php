<?php

namespace App\Services;

use App\Models\Caste;
use App\Models\Occupation;
use App\Models\Zone;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MasterService
{


   public function storeCaste($religion, $caste): Caste
   {
      return Caste::create([
         'religion_code' => $religion,
         'name' => $caste,
      ]);
   }

   public function checkCaste($religion_code, $caste): bool
   {
      return Caste::where('religion_code', $religion_code)->where('name', $caste)->exists();
   }

   public function storeZone($zone_name): Zone
   {
      $zone = Zone::latest('id')->first();
      return Zone::create([
         'zone_code' => $zone ? $zone->zone_code + 1 : 1,
         'zone_name' => $zone_name,
      ]);
   }

   public function storeOccupation($occupation): Occupation
   {
      $occ = Occupation::latest('id')->first();
      return Occupation::create([
         'occ_code' => $occ ? $occ->occ_code + 1 : 1,
         'name' => $occupation,
      ]);
   }
}
