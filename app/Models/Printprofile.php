<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printprofile extends Model
{
    protected $table = 'printprofile';

    protected $fillable = [
        'rno',
        'dated',
        'time',
        'empid',
        'wc',
        'status',
    ];

    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
