<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Chat extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chats';
    protected $fillable = [
        'sender',
        'msgfrom',
        'receiver',
        'msgto',
        'message',
        'createdAt',
        'read',
    ];
}
