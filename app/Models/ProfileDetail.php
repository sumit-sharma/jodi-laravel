<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileDetail extends Model
{
    protected $table = 'profile_details';

    protected $fillable = [
        'rno',
        'package',
        'service',
        'tc',
        'tc2',
        'tl',
        'tl2',
        'rm',
        'otherdetails',
        'reference',
        'duration',
    ];
}
