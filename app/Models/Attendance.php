<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $fillable = [
        'empid',
        'dated',
        'intime',
        'outtime',
        'status',
        'remarks',
        'ent_by',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'empid', 'username');
    }
}
