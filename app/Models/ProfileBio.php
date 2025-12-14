<?php

namespace App\Models;

use App\Enums\AstroStatusEnum;
use App\Enums\ComplexionEnum;
use App\Enums\DrinkingHabitEnum;
use App\Enums\EatingHabitEnum;
use App\Enums\EducationEnum;
use App\Enums\ReligionEnum;
use App\Enums\SmokingHabitEnum;
use Illuminate\Database\Eloquent\Model;

class ProfileBio extends Model
{
    protected $table   = "profile_bio";
    protected $fillable = [
        'rno',
        'gender',
        'refname',
        'dob',
        'tob',
        'age',
        'pob',
        'religion',
        'caste',
        'subcaste',
        'gotra',
        'hght',
        'hghtft',
        'wtkg',
        'complexion',
        'dd',
        'bg',
        'astrostatus',
        'drinkinghabit',
        'smokinghabit',
        'eatinghabit',
        'spects',
        'education',
        'occupation',
        'income',
        'rs',
        'ms',
        'childstatus',
        'dtype',
        'payment',
        'profiledate',
        'empid',
        'rfno',
        'brand'
    ];

    protected function casts()
    {
        return [
            'religion'      => ReligionEnum::class,
            'complexion'    => ComplexionEnum::class,
            'astrostatus'   => AstroStatusEnum::class,
            'drinkinghabit' => DrinkingHabitEnum::class,
            'smokinghabit'  => SmokingHabitEnum::class,
            'eatinghabit'   => EatingHabitEnum::class,
            'education'     => EducationEnum::class,
        ];
    }
}
