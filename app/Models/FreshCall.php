<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreshCall extends Model
{
    protected $table = 'freshcalls';

    protected $fillable = [
        'dated',
        'empid',
        'callsource',
        'noofcalls',
        'callsconnected',
        'followupcalls',
    ];
}
