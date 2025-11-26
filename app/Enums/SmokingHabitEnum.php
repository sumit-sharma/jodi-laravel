<?php

namespace App\Enums;

enum SmokingHabitEnum:int
{
    case NonSmoker = 1;
    case Smoker = 2;
    case DontKnow = 3;
    case Occasionally = 4;

    public function label(): string
    {
        return match ($this) {
            self::NonSmoker => 'Non Smoker',
            self::Smoker => 'Smoker',
            self::DontKnow => "Don't Know",
            self::Occasionally => "Occasionally",
        };
    }
}
