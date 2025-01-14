<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat Overzicht') }}
        </h2>
    </x-slot>

    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">

    <div class="chat-overview">
    <div class="user-list-container">
        @foreach ($users as $user)
            <div class="user-item {{ $user->is_unread ? 'unread' : '' }}">
                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('default-avatar.png') }}" alt="Profielfoto" class="profile-picture">
                <div class="user-info">
                    <a href="{{ route('chat.messages', $user->id) }}">{{ $user->name }}</a>
                    <p class="last-message">
                        {{ Str::limit($user->last_message, 30) }}
                        <span class="message-time">{{ $user->last_message_time }}</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

</x-app-layout>
