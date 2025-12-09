<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meeting';
    protected $fillable = [
        'rno',
        'proposal',
        'dated',
        'time',
        'place',
        'mtg_by1',
        'mtg_by2',
        'meeting_type',
        'remarks',
        'att_by1',
        'att_by2',
    ];


}
