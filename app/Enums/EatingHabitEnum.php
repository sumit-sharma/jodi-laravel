<?php

namespace App\Enums;

enum EatingHabitEnum: int
{
    case NoPref = 0;
    case Vegetarian = 1;
    case Eggetarian = 2;
    case NonVegetarian = 3;
    case OccasionallyNonVegetarian = 5;
    case NA = 6;
    case NS = 7;
    case NG = 8;
    case DontKnow = 4;

    public function label(): string
    {
        return match ($this) {
            self::NoPref => 'No Preferences',
            self::Vegetarian => 'Vegetarian',
            self::Eggetarian => 'Eggetarian',
            self::NonVegetarian => 'Non Vegetarian',
            self::OccasionallyNonVegetarian => 'Occasionally Non Vegetarian',
            self::DontKnow => "Don't Know",
            self::NA => 'NA',
            self::NS => 'NA',
            self::NG => 'NA',
        };
    }
}
