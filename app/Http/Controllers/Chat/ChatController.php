<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;


class ChatController extends Controller
{
    /**
    * Show the chat interface with latest messages.
    */
    public function index()
    {
        $messages = Message::with('user')->get();

        return Inertia::render('Chat',  [
            'messages' => $messages,
        ]);
    }

    /**
    * Send a new chat message.
    */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = $user->messages()->create([
            'user_id' => $user->id,
            'channel_id' => 1,
            'content' => $request->input('message')
        ]);
        return ['status' => 'Message Sent!'];
    }
}
