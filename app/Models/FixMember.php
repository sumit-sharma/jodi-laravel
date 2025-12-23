<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FixMember extends Model
{
    protected $table = 'fix_member';

    // No created_at / updated_at columns
    public $timestamps = false;

    protected $fillable = [
        'rno',
        'dated',
        'time',
        'fix_by',
        'fixed_through',
        'remarks',
        'status',
        'update_by',
        'update_date',
        'update_time',
    ];
}
