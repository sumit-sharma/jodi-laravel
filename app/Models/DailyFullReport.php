<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyFullReport extends Model
{
    protected $table = 'dailyfullreport';

    protected $fillable = [
        'userid',
        'empid',
        'empname',
        'nde',
        'edata',
        'interaction',
        'sl',
        'ms',
        'fu',
        'ma',
        'mat',
        'mf',
        'fc',
        'nr',
        'flc',
        'refa',
        'af',
        'aa',
        'nor',
        'dm'
    ];
}
