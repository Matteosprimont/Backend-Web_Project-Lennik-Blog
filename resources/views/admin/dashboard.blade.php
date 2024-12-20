@extends('layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="kop-tekst">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <link href="{{ asset('css/admin/dasboard.css') }}" rel="stylesheet">

    <div class="container">
        <div class="container2">
            <div class="tabel-container">
                <h3 class="titel">{{ __('Gebruikerslijst') }}</h3>
                <table class="gebruikers-tabel">
                    <thead class="tabel-kop">
                        <tr>
                            <th class="cel">{{ __('Naam') }}</th>
                            <th class="cel">{{ __('E-mail') }}</th>
                            <th class="cel">{{ __('Admin') }}</th>
                            <th class="cel">{{ __('Acties') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="tabel-rij">
                                <td class="tabel-cel">{{ $user->name }}</td>
                                <td class="tabel-cel">{{ $user->email }}</td>
                                <td class="tabel-cel">
                                    @if ($user->is_admin)
                                        <span class="admin-status">{{ __('Ja') }}</span>
                                    @else
                                        <span class="geen-admin-status">{{ __('Nee') }}</span>
                                    @endif
                                </td>
                                <td class="tabel-cel">
                                    @if (!$user->is_admin)
                                        <button class="promoveer-knop" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" onclick="changeRights(this, 'promoveer')">
                                            {{ __('Promoveer naar Admin') }}
                                        </button>
                                    @else
                                        <button class="verwijder-admin-knop" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" onclick="changeRights(this, 'verwijderAdmin')">
                                            {{ __('Verwijder Adminrechten') }}
                                        </button>
                                    @endif
                                    <button class="verwijder-knop" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" onclick="changeRights(this, 'verwijder')">
                                        {{ __('Verwijder') }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="verwijderPopUp" class="popup hidden">
        <div class="popup-content">
            <h2 id="popup-tekst">{{ __('Weet je zeker dat je deze gebruiker wilt verwijderen?') }}</h2>
            <p>{{ __('Deze actie kan niet ongedaan worden gemaakt.') }}</p>
            <div class="popup-buttons">
                <form method="POST" id="deleteForm" action="" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bevestig-button">{{ __('Ja, Verwijder') }}</button>
                </form>
                <button onclick="closePopup('verwijderPopUp')" class="annuleer-button">{{ __('Nee, Annuleer') }}</button>
            </div>
        </div>
    </div>

    <div id="promoveerPopUp" class="popup hidden">
        <div class="popup-content">
            <h2 id="promoveer-popup-tekst">{{ __('Weet je zeker dat je :name als Admin wilt instellen?', ['name' => ':name']) }}</h2>
            <p>{{ __('Deze actie kan niet ongedaan worden gemaakt.') }}</p>
            <div class="popup-buttons">
                <form method="POST" id="promoteForm" action="" class="inline">
                    @csrf
                    @method('POST')
                    <button type="submit" class="bevestig-button">{{ __('Ja, Promoveer') }}</button>
                </form>
                <button onclick="closePopup('promoveerPopUp')" class="annuleer-button">{{ __('Nee, Annuleer') }}</button>
            </div>
        </div>
    </div>

    <div id="verwijderAdminPopUp" class="popup hidden">
        <div class="popup-content">
            <h2 id="verwijder-admin-popup-tekst">{{ __('Weet je zeker dat je de adminrechten van :name wilt verwijderen?', ['name' => ':name']) }}</h2>
            <p>{{ __('Deze actie kan niet ongedaan worden gemaakt.') }}</p>
            <div class="popup-buttons">
                <form method="POST" id="removeAdminForm" action="" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bevestig-button">{{ __('Ja, Verwijder Adminrechten') }}</button>
                </form>
                <button onclick="closePopup('verwijderAdminPopUp')" class="annuleer-button">{{ __('Nee, Annuleer') }}</button>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/adminDashboard.js') }}"></script>
@endsection
