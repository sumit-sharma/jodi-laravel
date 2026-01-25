<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bouncedmail extends Model
{
    protected $table = 'bouncedmail';

    protected $fillable = [
        'rno',
        'email',
    ];


    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
