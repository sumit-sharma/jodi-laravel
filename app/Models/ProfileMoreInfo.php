<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileMoreInfo extends Model
{
    protected $table = 'profile_moreinfo';

    protected $fillable = [
        'rno',
        'dated',
        'time',
        'empid',
        'metwith',
        'member',
        'profession',
        'family',
        'prop1',
        'prop2',
        'prop3',
        'properties',
        'residence',
        'business',
        'income',
        'rentedincome',
        'turnover',
        'vehicle',
        'roka',
        'remarks',
    ];
}
