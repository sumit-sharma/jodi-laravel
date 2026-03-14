<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ChatConversation extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chat_conversations';
    public $timestamps = false;
    protected $fillable = [
        'conversation_id',
        'participants',
        'last_message',
        'last_message_time',
        'last_sender',
        'unread_counts',
    ];
}
