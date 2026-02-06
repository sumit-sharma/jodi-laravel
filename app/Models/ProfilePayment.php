<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilePayment extends Model
{
    protected $table = 'profile_payment';


    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
