<?php

namespace App\Enums;

enum EatingHabitEnum: int
{
    case Vegetarian = 1;
    case Eggetarian = 2;
    case NonVegetarian = 3;
    case OccasionallyNonVegetarian = 5;
    case DontKnow = 4;

    public function label(): string
    {
        return match ($this) {
            self::Vegetarian => 'Vegetarian',
            self::Eggetarian => 'Eggetarian',
            self::NonVegetarian => 'Non Vegetarian',
            self::OccasionallyNonVegetarian => 'Occasionally Non Vegetarian',
            self::DontKnow => "Don't Know",
        };
    }
}
