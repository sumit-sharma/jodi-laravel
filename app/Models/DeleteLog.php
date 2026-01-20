<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeleteLog extends Model
{
    protected $table = 'delete_logs';
    protected $fillable = [
        'rno',
        'refname',
        'empid',
        'dated',
        'time'
    ];
}
