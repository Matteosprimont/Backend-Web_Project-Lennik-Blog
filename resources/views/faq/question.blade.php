<x-app-layout>
    <x-slot name="header">
        <h2 class="faq-title">{{ __('FAQ Beheer') }}</h2>
    </x-slot>

    <link href="{{ asset('css/faq.css') }}" rel="stylesheet">

    <div class="faq-container">

        <div class="form-section">
            <h3 class="section-title">{{ __('Categorie Aanmaken') }}</h3>
            <form method="POST" action="{{ route('faq.category.store') }}">
                @csrf
                <div>
                    <label for="name">{{ __('Categorie Naam') }}</label>
                    <input type="text" id="name" name="name" class="category-item" required>
                </div>
                <button type="submit" class="add-button">{{ __('Categorie Toevoegen') }}</button>
            </form>
        </div>

        <hr class="divider">

        <div class="form-section">
            <h3 class="section-title">{{ __('Vraag Toevoegen') }}</h3>
            <form method="POST" action="{{ route('faq.question.store') }}">
                @csrf
                <div>
                    <label for="question">{{ __('Vraag') }}</label>
                    <input type="text" id="question" name="question" class="category-item" required>
                </div>
                <div>
                    <label for="answer">{{ __('Antwoord') }}</label>
                    <textarea id="answer" name="answer" class="category-item" required></textarea>
                </div>
                <div>
                    <label for="category_id">{{ __('Categorie') }}</label>
                    <select id="category_id" name="category_id" class="category-item" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="add-button">{{ __('Vraag Toevoegen') }}</button>
            </form>
        </div>

    </div>
</x-app-layout>
