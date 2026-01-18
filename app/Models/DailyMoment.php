<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyMoment extends Model
{
    protected $table = 'daily_moment';

    protected $fillable = [
        'dated',
        'timefrom',
        'timeto',
        'empid',
        'moment',
    ];


    public function employee()
    {
        return $this->belongsTo(User::class, 'empid', 'username');
    }
}
