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
    protected $guarded = [];

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
