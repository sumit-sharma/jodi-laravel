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
        'mc',
        'rm',
        'otherdetails',
        'reference',
        'duration',
    ];
}
