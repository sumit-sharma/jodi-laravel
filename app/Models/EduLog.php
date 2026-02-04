<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EduLog extends Model
{
    protected $table = 'edu_log';

    protected $fillable = [
        'rno',
        'educourse',
        'eduinst',
        'eduyear',
        'dated',
        'time',
        'empid',
    ];
}
