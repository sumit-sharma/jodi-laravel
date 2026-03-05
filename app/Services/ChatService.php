<?php

namespace App\Services;

use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChatService
{


    public function getRecentChat($userId)
    {
        return DB::connection('mongodb')
            ->table('chat_conversations')
            ->where(function ($query) use ($userId) {
                $query->where('participants.sender', $userId)
                    ->orWhere('participants.receiver', $userId);
            })
            ->orderBy('last_message_time', 'desc')
            ->get();
    }


    public function calculateRecentChat($userId)
    {
        $results = DB::connection('mongodb')
            ->table('chats')
            ->raw(function ($collection) use ($userId) {

                return $collection->aggregate([

                    // 1️⃣ Only current user's chats
                    [
                        '$match' => [
                            '$or' => [
                                ['sender' => $userId],
                                ['receiver' => $userId]
                            ]
                        ]
                    ],

                    // 2️⃣ Sort newest first (Move this before $project to use index)
                    [
                        '$sort' => [
                            'createdAt' => -1
                        ]
                    ],

                    // 3️⃣ Create consistent conversation_id
                    [
                        '$project' => [
                            'sender' => 1,
                            'receiver' => 1,
                            'message' => 1,
                            'createdAt' => 1,
                            'read' => 1,
                            'conversation_id' => [
                                '$cond' => [
                                    'if' => ['$lt' => ['$sender', '$receiver']],
                                    'then' => [
                                        '$concat' => [
                                            ['$toString' => '$sender'],
                                            '_',
                                            ['$toString' => '$receiver']
                                        ]
                                    ],
                                    'else' => [
                                        '$concat' => [
                                            ['$toString' => '$receiver'],
                                            '_',
                                            ['$toString' => '$sender']
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],

                    // 4️⃣ Group by conversation
                    [
                        '$group' => [
                            '_id' => '$conversation_id',

                            'participants' => [
                                '$first' => [
                                    'sender' => '$sender',
                                    'receiver' => '$receiver'
                                ]
                            ],

                            'last_message' => [
                                '$first' => '$message'
                            ],

                            'last_message_time' => [
                                '$first' => '$createdAt'
                            ],

                            'last_sender' => [
                                '$first' => '$sender'
                            ],

                            'unread_count' => [
                                '$sum' => [
                                    '$cond' => [
                                        [
                                            '$and' => [
                                                ['$eq' => ['$receiver', $userId]],
                                                ['$eq' => ['$read', false]]
                                            ]
                                        ],
                                        1,
                                        0
                                    ]
                                ]
                            ]
                        ]
                    ],

                ], [
                    'allowDiskUse' => true
                ]);
            });

        foreach ($results as $conv) {
            DB::connection('mongodb')
                ->table('chat_conversations')
                ->raw(function ($collection) use ($conv, $userId) {
                    $collection->updateOne(
                        ['_id' => $conv->_id],
                        [
                            '$set' => [
                                'participants' => $conv->participants,
                                'last_message' => $conv->last_message,
                                'last_message_time' => $conv->last_message_time,
                                'last_sender' => $conv->last_sender,
                                "unread_counts.$userId" => $conv->unread_count
                            ]
                        ],
                        ['upsert' => true]
                    );
                });
        }
    }


    public function getChatMessages($request)
    {
        $firstUsername = (int) $request->first_username;
        $secondUsername = (int) $request->second_username;
        return Chat::orderBy('createdAt', 'desc')
            ->where(function ($query) use ($firstUsername, $secondUsername) {
                $query->where('sender', $firstUsername)
                    ->where('receiver', $secondUsername);
            })
            ->orWhere(function ($query) use ($firstUsername, $secondUsername) {
                $query->where('sender', $secondUsername)
                    ->where('receiver', $firstUsername);
            })
            ->cursorPaginate(request()->per_page ?? 20);
    }

    public function setChatRead(int $senderId, int $receiverId)
    {
        return Chat::where('sender', $senderId)
            ->where('receiver', $receiverId)
            ->where('read', false)
            ->update(['read' => true]);
    }

    public function formatChatConversation($messages)
    {
        $grouped = $messages->groupBy(function ($message) {
            return $message->createdAt->format('Y-m-d');
        });
        $formatted = $grouped->mapWithKeys(function ($msgs, $date) {
            $carbon = Carbon::parse($date);

            if ($carbon->isToday()) {
                $label = 'Today';
            } elseif ($carbon->isYesterday()) {
                $label = 'Yesterday';
            } else {
                $label = $carbon->format('d M Y');
            }

            return [$label => $msgs->values()];
        });
        return $formatted;
    }
}
