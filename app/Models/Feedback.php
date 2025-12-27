<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'rno',
        'proposal',
        'fstatus',
        'feedback',
        'fdate',
        'time',
        'fby',
    ];


    public function sender()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }

    public function receiver()
    {
        return $this->belongsTo(ViewProfile::class, 'proposal', 'rno');
    }
}
