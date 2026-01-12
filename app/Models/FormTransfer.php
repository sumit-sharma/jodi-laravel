<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormTransfer extends Model
{
    protected $table = 'form_transfer';
    protected $fillable = [
        'rno',
        'assign_from',
        'assign_date',
        'assign_time',
        'assign_to',
        'received_date',
        'received_time',
        'remarks',
    ];


    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
