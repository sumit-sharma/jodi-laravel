<?php

namespace App\Enums;

enum EducationEnum:int
{
    case None = 0;
    case Matriculate = 1;
    case UnderGraduate = 2;
    case Graduate = 3;
    case DoubleGraduate = 6;
    case PostGraduate = 4;
    case Doctorate = 5;
    case Diploma = 7;


    public function label(): string
    {
        return match ($this) {
            self::None => 'None',
            self::Matriculate => 'Matriculate',
            self::UnderGraduate => 'Under Graduate',
            self::Graduate => 'Graduate',
            self::DoubleGraduate => 'Double Graduate',
            self::PostGraduate => 'Post Graduate',
            self::Doctorate => 'Doctorate',
            self::Diploma => 'Diploma',
        };
    }
}
