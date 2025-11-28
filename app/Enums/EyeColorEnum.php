<?php

namespace App\Enums;

enum EyeColorEnum: int
{
    case NA = 0;
    case Amber = 1;
    case Blue = 2;
    case Brown = 3;
    case Black = 4;
    case Gray = 5;
    case Green = 6;
    case Hazel = 7;
    case RedAndViolet = 8;
    case Spectrum = 9;
    case Undefined = 10;

    public function label(): string
    {
        return match ($this) {
            self::NA => 'N/A',
            self::Amber => 'Amber',
            self::Blue => 'Blue',
            self::Brown => 'Brown',
            self::Black => 'Black',
            self::Gray => 'Gray',
            self::Green => 'Green',
            self::Hazel => 'Hazel',
            self::RedAndViolet => 'Red & Violet',
            self::Spectrum => 'Spectrum',
            self::Undefined => 'Undefined',
        };
    }
}
