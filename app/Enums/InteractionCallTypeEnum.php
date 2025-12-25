<?php

namespace App\Enums;

enum InteractionCallTypeEnum: int
{
    case Incoming      = 0;
    case Outgoing      = 1;
    case SMS           = 2;
    case email         = 3;
    case PersonalVisit = 4;
    case HomeVisit     = 5;
    case NR            = 6;


    public function label(): string
    {
        return match ($this) {
            self::Incoming      => 'Incoming',
            self::Outgoing      => 'Outgoing',
            self::SMS           => 'Sms',
            self::email         => 'Email',
            self::PersonalVisit => 'Personal Visit',
            self::HomeVisit     => 'Home Visit',
            self::NR            => 'NR',
        };
    }
}
