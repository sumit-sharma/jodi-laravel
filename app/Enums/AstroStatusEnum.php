<?php

namespace App\Enums;

enum AstroStatusEnum: int
{

    case Manglik = 1;
    case SlightlyManglik = 2;
    case NonManglik = 3;
    case DontBelieve = 4;
    case DontKnow = 5;

    public function label(): string
    {
        return match ($this) {
            self::Manglik => 'Manglik',
            self::SlightlyManglik => 'Slightly Manglik',
            self::NonManglik => 'Non Manglik',
            self::DontBelieve => "Don't Believe",
            self::DontKnow => "Don't Know",
        };
    }

}
