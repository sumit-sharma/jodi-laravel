<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditDataLog extends Model
{
    protected $table = 'editdatalog';
    protected $fillable = [
        'dated',
        'time',
        'rno',
        'empid',
        'field',
        'olddata',
        'newdata',
    ];


    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'empid', 'username');
    }
}
