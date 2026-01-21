<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiry';

    protected $fillable = [
        'rno',
        'dated',
        'time',
        'empid',
        'enqpur',
        'remarks',
        'furtheraction',
        'slfor',
        'updatedby',
        'updatedatetime',
        'status',
    ];

    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
