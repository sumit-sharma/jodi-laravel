<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackOption extends Model
{
    protected $table = 'feedback_option';
    protected $fillable = [
        'feedback',
        'status',
    ];
}
