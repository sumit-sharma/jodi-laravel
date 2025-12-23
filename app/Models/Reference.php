<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'refer';

    protected $fillable = [
        'refno',
        'referencename',
        'candidatename',
        'searchingfor',
        'address',
        'city',
        'contactno',
        'emailid',
        'source',
        'givenby',
        'remarks',
        'status',
        'assignto',
        'dated',
        'empid',
    ];


    public function bio()
    {
        return $this->belongsTo(ProfileBio::class, 'refno', 'rfno');
    }
}
