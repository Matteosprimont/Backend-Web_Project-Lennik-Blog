<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat met ') . $user->name }}
        </h2>
    </x-slot>

    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">

    <div class="chat-page-container">
        <div class="messages-container">
            @foreach ($messages as $message)
                <div class="{{ $message->sender_id === auth()->id() ? 'message-sender' : 'message-receiver' }}">
                    <p>{{ $message->message }}</p>
                    <small>{{ $message->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        </div>

        <form action="{{ route('chat.send') }}" method="POST" class="message-form">
            @csrf
            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
            <textarea name="message" placeholder="Typ een bericht..." required></textarea>
            <button type="submit">Versturen</button>
        </form>
    </div>
</x-app-layout>
