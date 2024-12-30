<x-app-layout>
    <x-slot name="header">
        <h2 class="faq-title">{{ __('Categorie Aanmaken') }}</h2>
    </x-slot>

    <link href="{{ asset('css/faq.css') }}" rel="stylesheet">

    <div class="faq-container">
        <form method="POST" action="{{ route('faq.category.store') }}">
            @csrf
            <div>
                <label for="name">{{ __('Categorie Naam') }}</label>
                <input type="text" id="name" name="name" class="category-item" required>
            </div>
            <button type="submit" class="add-button">{{ __('Categorie Toevoegen') }}</button>
        </form>
    </div>
</x-app-layout>
