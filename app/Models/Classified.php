<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classified extends Model
{
    protected $table = 'classified';
    protected $fillable = [
        'rno',
        'empid',
        'dated',
        'time',
        'status',
    ];
}
