<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Wachtwoord vergeten? Geen probleem. Laat ons je e-mailadres weten en we sturen je een link om je wachtwoord opnieuw in te stellen.') }}
    </div>

    <!-- Sessiestatus -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- E-mailadres -->
        <div>
            <x-input-label for="email" :value="__('E-mailadres')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Stuur link om wachtwoord te resetten') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
