<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoldMember extends Model
{
    protected $table = 'hold_member';

    // No created_at / updated_at columns
    public $timestamps = false;

    protected $fillable = [
        'rno',
        'hold_req_by',
        'hold_by',
        'dated',
        'time',
        'reason',
        'status',
    ];

    public function ViewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
