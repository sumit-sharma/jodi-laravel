<?php
namespace App\Enums;

enum HairColorEnum: int
{
    case Black = 1;
    case Brown = 2;
    case Grey  = 3;
    case Blond = 4;
    case Bald  = 5;

    public function label(): string
    {
        return match ($this) {
            self::Black => 'Black',
            self::Brown => 'Brown',
            self::Grey  => 'Grey',
            self::Blond => 'Blond',
            self::Bald  => 'Bald',
        };
    }
}
