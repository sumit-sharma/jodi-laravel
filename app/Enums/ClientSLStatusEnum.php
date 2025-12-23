<?php

namespace App\Enums;

enum ClientSLStatusEnum: int
{
    case NA = 0;
    case OK = 1;
    case NI = 2;
    case WGB = 3;
    case RNG = 4;

    public function label(): string
    {
        return match ($this) {
            self::NA => '',
            self::OK => 'OK',
            self::NI => 'NI',
            self::WGB => 'WGB',
            self::RNG => 'RNG',
        };
    }
}
