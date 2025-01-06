<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profiel van ') . $user->name }}
        </h2>
    </x-slot>

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <div class="profile-container">
        <div class="profile-left">
            @if ($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" class="profile-photo">
            @else
                <div class="placeholder-photo">Geen profielfoto beschikbaar</div>
            @endif
            <h2 class="user-name">{{ $user->name }}</h2>
            <p class="user-email">{{ $user->email }}</p>
            <p class="user-birthday">Geboortedatum: {{ $user->birthday ?? 'Niet opgegeven' }}</p>
        </div>

        <div class="profile-right">
            <h3 class="about-title">Over Mij</h3>
            <p class="about-text">
                {{ $user->about_me ?? 'Deze gebruiker heeft nog geen informatie gedeeld.' }}
            </p>
        </div>
    </div>
</x-app-layout>
