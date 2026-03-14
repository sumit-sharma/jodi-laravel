<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Chat extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chats';
    public $timestamps = false;
    protected $fillable = [
        'conversation_id',
        'sender',
        'msgfrom',
        'receiver',
        'msgto',
        'message',
        'createdAt',
        'read',
    ];
}
