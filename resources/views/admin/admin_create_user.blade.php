<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gebruiker Handmatig Aanmaken') }}
        </h2>
    </x-slot>

    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">

    <div class="form-container">
        <h3 class="form-title">{{ __('Nieuwe Gebruiker Toevoegen') }}</h3>
        <form method="POST" action="{{ route('admin.user.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Naam') }}</label>
                <input type="text" id="name" name="name" class="form-input" required placeholder="Gebruikersnaam">
            </div>

            <div class="form-group">
                <label for="email">{{ __('E-mail') }}</label>
                <input type="email" id="email" name="email" class="form-input" required placeholder="E-mail">
            </div>

            <div class="form-group">
                <label for="password">{{ __('Wachtwoord') }}</label>
                <input type="password" id="password" name="password" class="form-input" required placeholder="Wachtwoord">
            </div>

            <div class="form-group">
                <label for="role">{{ __('Rol') }}</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="user">{{ __('Gebruiker') }}</option>
                    <option value="admin">{{ __('Admin') }}</option>
                </select>
            </div>

            <button type="submit" class="form-button">{{ __('Gebruiker Aanmaken') }}</button>
        </form>
    </div>
</x-app-layout>
