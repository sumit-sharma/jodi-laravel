<?php

namespace App\Services;

use App\Events\MessageSent;
use App\Models\Chat;
use App\Models\ChatConversation;
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
        $firstUsername = $request->first_username;
        $secondUsername = $request->second_username;

        // Generate conversation_id consistently (same as sendMessage)
        $conversation_id = $firstUsername < $secondUsername ? "{$firstUsername}_{$secondUsername}" : "{$secondUsername}_{$firstUsername}";

        return Chat::where(function ($query) use ($conversation_id, $firstUsername, $secondUsername) {
            $query->where('conversation_id', $conversation_id)
                ->orWhere(function ($q) use ($firstUsername, $secondUsername) {
                    $q->where(function ($sq) use ($firstUsername, $secondUsername) {
                        $sq->where('sender', (int) $firstUsername)->where('receiver', (int) $secondUsername);
                    })->orWhere(function ($sq) use ($firstUsername, $secondUsername) {
                        $sq->where('sender', (string) $firstUsername)->where('receiver', (string) $secondUsername);
                    });
                })
                ->orWhere(function ($q) use ($firstUsername, $secondUsername) {
                    $q->where(function ($sq) use ($firstUsername, $secondUsername) {
                        $sq->where('sender', (int) $secondUsername)->where('receiver', (int) $firstUsername);
                    })->orWhere(function ($sq) use ($firstUsername, $secondUsername) {
                        $sq->where('sender', (string) $secondUsername)->where('receiver', (string) $firstUsername);
                    });
                });
        })
            ->orderBy('createdAt', 'desc')
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


    public function sendMessage($data)
    {
        $message = DB::transaction(function () use ($data) {
            $conversation_id = $data['sender'] < $data['receiver'] ? "{$data['sender']}_{$data['receiver']}" : "{$data['receiver']}_{$data['sender']}";
            $message = Chat::create([
                'sender' => $data['sender'],
                'receiver' => $data['receiver'],
                'message' => $data['message'],
                'msgfrom' => fetchUserByUsername($data['sender'])->name . ' ' . $data['sender'],
                'msgto' => fetchUserByUsername($data['receiver'])->name . ' ' . $data['receiver'],
                'conversation_id' => $conversation_id,
                'createdAt' => now(),
            ]);

            $conversation = ChatConversation::where('_id', $conversation_id)->first();
            info($conversation);
            // dd($conversation);
            if ($conversation) {
                $unreadCounts = $conversation->unread_counts ?? [];
                if (isset($unreadCounts[$data['receiver']])) {
                    (int) $unreadCounts[$data['receiver']] = (int)$unreadCounts[$data['receiver']] + 1;
                } else {
                    (int) $unreadCounts[$data['receiver']] = 1;
                }
                $conversation->unread_counts = $unreadCounts;
            }


            $conversation = new ChatConversation();
            $conversation->_id = $conversation_id;
            $conversation->unread_counts = [
                (int) $data['receiver'] => 1,
            ];


            $conversation->last_message = $data['message'];
            $conversation->last_message_time = now()->format('Y-m-d H:i:s');
            $conversation->last_sender = (int) $data['sender'];
            $conversation->participants = [
                'sender' => (int) $data['sender'],
                'receiver' => (int) $data['receiver'],
            ];
            $conversation->save();
            event(new MessageSent($message));

            return $message;
        });
        return $message;
    }
}
