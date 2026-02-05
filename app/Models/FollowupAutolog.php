<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowupAutolog extends Model
{
    protected $table = 'followup_autolog';

    protected $fillable = [
        'rno',
        'empid',
        'dated',
    ];



    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
