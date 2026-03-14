<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\ChatService;
use App\Services\MiscService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $chatService;
    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['getRecentChats'] = $this->chatService->getRecentChat((int) auth()->user()->username);
        // return $data['getRecentChats'];
        // dd($data['getRecentChats']);
        $employees = MiscService::getTableData('users', ['username', 'name'], 'name', 'asc', "status = 1");

        $data['employees'] = $employees->groupBy(function ($item) {
            return strtoupper(substr($item->name, 0, 1));
        });
        return view('panel.chat.chat', $data);
    }

    public function recentChatList($userId = null)
    {
        $userId = $userId ?? auth()->user()->username;
        $getRecentChats = $this->chatService->getRecentChat((int) $userId);

        foreach ($getRecentChats as $chat) {
            if ($chat->participants['sender'] == $userId) {
                $otherUserName = $chat->participants['receiver'];
            } else {
                $otherUserName = $chat->participants['sender'];
            }

            $otherUser = fetchUserByUsername($otherUserName);
            $chat->otherUser = [
                'name' => $otherUser?->name ?? 'Unknown',
                'username' => $otherUserName,
                'initial' => $otherUser?->name ? strtoupper($otherUser->name[0]) : 'U'
            ];
            $chat->unreadCount = $chat->unread_counts[$userId] ?? 0;
        }

        return response()->json([
            'status' => "success",
            'message' => 'Recent chat list fetched successfully',
            'data' => $getRecentChats
        ]);
    }


    public function getChatMessages($userid, $otherUser = null)
    {
        $otherUser = $otherUser ?? auth()->user()->username;
        request()->merge([
            'first_username' => $userid,
            'second_username' => $otherUser
        ]);
        $getChatMessages = $this->chatService->getChatMessages(request());
        return response()->json([
            'status' => "success",
            'message' => 'Chat messages fetched successfully',
            'data' => $getChatMessages
        ]);
    }

    public function setChatRead($userid, $otherUser = null)
    {
        $otherUser = $otherUser ?? auth()->user()->username;
        $this->chatService->setChatRead($userid, $otherUser);
        return response()->json([
            'status' => "success",
            'message' => 'Chat read status updated successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'receiver' => 'required',
            'message' => 'required',
        ]);
        $data['sender'] = auth()->user()->username;
        $message = $this->chatService->sendMessage($data);
        return response()->json([
            'status' => "success",
            'message' => 'Chat message sent successfully',
            'data' => $message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
