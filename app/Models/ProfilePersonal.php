<?php

namespace App\Models;

use App\Enums\EyeColorEnum;
use App\Enums\HairColorEnum;
use Illuminate\Database\Eloquent\Model;

class ProfilePersonal extends Model
{
    protected $table = "profile_personal";
    protected $fillable = [
        'rno',
        'visa',
        'rcity',
        'rcountry',
        'marriageinfo',
        'child',
        'childdetails',
        'familystatus',
        'fathersname',
        'mothersname',
        'fatherdetails',
        'motherdetails',
        'familyincome',
        'familyincomem',
        'typeoffamily',
        'familynative',
        'hobbies',
        'characteristics',
        'eyecolor',
        'haircolor',
        'salary',
        'budget',
        'nationality',
        'familyhistory',
        'contactperson',
        'contactaddress',
        'contactcity',
        'contactstate',
        'contactpincode',
        'contactcountry',
        'contactphone',
        'contactemail',
        'contactrelation',
        'personaldetails',
        'contactzone',
        'arealocation'
    ];

    protected $hidden = [
        'contactphone',
        'contactemail',
    ];

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
