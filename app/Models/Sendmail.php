<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sendmail extends Model
{
    protected $table = 'sendmail';

    protected $fillable = [
        'dated',
        'time',
        'rno',
        'proposal',
        'photos',
        'matter',
        'wc',
        'pdftype',
        'empid',
        'status',
        'addl_st',
        'feedback',
        'feedback1',
        'fdb_by',
        'fdb_date',
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
