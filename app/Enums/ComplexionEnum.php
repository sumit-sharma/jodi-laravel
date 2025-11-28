<?php
namespace App\Enums;

enum ComplexionEnum: int {

    case NA = 0;
    case VERY_FAIR = 1;
    case FAIR      = 2;
    case WHEATISH  = 3;
    case BROWN     = 4;
    case DARK      = 5;

    public function label(): string
    {
        return match ($this) {
            self::NA => 'N/A',
            self::VERY_FAIR => 'Very Fair',
            self::FAIR      => 'Fair',
            self::WHEATISH  => 'Wheatish',
            self::BROWN     => 'Brown',
            self::DARK      => 'Dark',
        };
    }

}
