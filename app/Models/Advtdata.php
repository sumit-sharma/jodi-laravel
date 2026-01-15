<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advtdata extends Model
{
    protected $table = "advtdata";

    protected $fillable = [
        'rno',
        'matchfor',
        'age',
        'hght',
        'community',
        'education',
        'occupation',
        'mobile',
        'email',
        'remarks',
        'assignto',
        'empid',
        'edate'
    ];




    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
