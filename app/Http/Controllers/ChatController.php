<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $lastMessageId = $request->query('lastMessageId', 0);

        $messages = Message::with('user')
            ->where('id', '>', $lastMessageId)
            ->orderBy('id', 'asc')
            ->get();

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        session_start();
        $user = session('user');
        $message = new Message;
        $message->content = $request->content;
        $message->user_id = $user->id;
        $message->save();

        return response()->json($message->load('user'), 201);
    }
}