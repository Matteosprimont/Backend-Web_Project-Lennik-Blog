<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller {
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        $users->map(function ($user) {
            $lastMessage = Message::where(function ($query) use ($user) {
                $query->where('sender_id', auth()->id())
                    ->where('receiver_id', $user->id);
            })->orWhere(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', auth()->id());
            })->orderBy('created_at', 'desc')->first();
    
            $user->last_message = $lastMessage->message ?? 'Geen berichten';
            $user->last_message_time = $lastMessage
                ? $lastMessage->created_at->diffForHumans()
                : 'Nog geen berichten';
    
            $user->is_unread = Message::where('sender_id', $user->id)
                ->where('receiver_id', auth()->id())
                ->where('is_read', false)
                ->exists();
    
            return $user;
        });
    
        return view('chat.index', compact('users'));
    }
    
    
    

    public function send(Request $request) {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('chat.index')->with('success', 'Bericht verzonden!');
    }

    public function messages($userId)
    {
        $user = User::findOrFail($userId);
    
        $messages = Message::where(function ($query) use ($userId) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();
    
        Message::where('receiver_id', Auth::id())
            ->where('sender_id', $userId)
            ->update(['is_read' => true]);
    
        return view('chat.messages', compact('user', 'messages'));
    }
    
    public function getMessages($userId) {
        $messages = Message::with('sender', 'receiver')
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $userId);
            })
            ->orWhere(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                      ->where('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        $receiver = User::findOrFail($userId);

        return view('chat.messages', compact('messages', 'receiver'));
    }
}
