<?php

namespace App\Enums;

enum AppointmentStatusEnum: int
{
    case Pending = 0;
    case Done = 1;
    case ToDelete = 2;
    case Cancelled = 3;

    public function label(): string
    {
        return match ($this) {
            self::Pending => '<span class="text-danger" title="Pending"><i data-feather="loader"></i></span>',
            self::Done => '<span class="text-success" title="Done"><i data-feather="check"></i></span>',
            self::ToDelete => '<span class="text-danger" title="To Delete"><i data-feather="trash"></i></span>',
            self::Cancelled => '<span class="text-danger" title="Cancelled"><i data-feather="x-circle"></i></span>',
        };
    }
}
