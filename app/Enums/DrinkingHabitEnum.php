<?php

namespace App\Enums;

enum DrinkingHabitEnum:int
{
    case NonConsumer = 1;
    case DrinkOccasionally = 2;
    case RegularDrinker = 3;
    case DontKnow = 4;

    public function label(): string
    {
        return match ($this) {
            self::NonConsumer => 'Non Consumer',
            self::DrinkOccasionally => 'Drink Occasionally',
            self::RegularDrinker => 'Regular Drinker',
            self::DontKnow => "Don't Know",
        };
    }
}
