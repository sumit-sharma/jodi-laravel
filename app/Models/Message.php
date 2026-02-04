<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'dated',
        'time',
        'msgfrom',
        'msgto',
        'message',
        'received',
    ];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'msgfrom', 'username');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'msgto', 'username');
    }
}
