<?php

namespace App\Http\Controllers\Client;

use App\Events\ChatEvent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $users = Chat::selectRaw("CASE WHEN sender_id is not null THEN sender_id ELSE receiver_id END as user_id")
                ->groupBy('user_id')
                ->get()->pluck('user_id');
        $users = User::whereIn('id', $users)->get();
        return view('pages.chat.index', compact('users'));
    }

    public function send(Request $request, User $user)
    {
        $message = new Chat();
        $message->sender_id = auth()->user()->isAdmin() ? null : auth()->user()->id;
        $message->receiver_id = auth()->user()->isAdmin() ? $user->id : null;
        $message->message = $request->message;
        $message->save();
        event(new ChatEvent($message));
        return redirect()->back();

    }

    public function show(User $user)
    {
        if (!auth()->user()->isAdmin()) {
            $user = auth()->user();
        } else {
            if ($user->id === auth()->user()->id) {
                return redirect()->route('chat.index');
            }
        }
        $chats = $user->chat;
        return view('pages.chat.show', compact('user', 'chats'));
    }
}
