<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowupLog extends Model
{
    protected $table = 'followup_log';

    protected $fillable = [
        'rno',
        'd_to',
        'd_by',
        'dated',
        'time'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
