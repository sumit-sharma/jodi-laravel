<?php

namespace App\Models;

use App\Enums\EyeColorEnum;
use App\Enums\HairColorEnum;
use Illuminate\Database\Eloquent\Model;

class ProfilePersonal extends Model
{
    protected $table = "profile_personal";
    protected $guarded = [];


    protected function casts()
    {
        return [
            'eyecolor' => EyeColorEnum::class,
            'haircolor' => HairColorEnum::class,
        ];
    }


    public function zone()
    {
        return $this->belongsTo(Zone::class, 'contactzone', 'zone_code');
    }

}
