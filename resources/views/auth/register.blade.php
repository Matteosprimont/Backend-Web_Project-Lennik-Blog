<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Naam -->
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- E-mailadres -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mailadres')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Wachtwoord -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Wachtwoord')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Bevestig Wachtwoord -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Al geregistreerd?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registreren') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
