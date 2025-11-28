<?php

namespace App\Enums;

enum ReligionEnum: int
{
    case Hindu = 1;
    case Sikh = 2;
    case Jain = 3;
    case Christian = 4;
    case Muslim = 5;
    case Atheist = 6;

    public function label(): string
    {
        return match ($this) {
            self::Hindu => 'Hindu',
            self::Sikh => 'Sikh',
            self::Jain => 'Jain',
            self::Christian => 'Christian',
            self::Muslim => 'Muslim',
            self::Atheist => 'Atheist',
        };
    }
}
