<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ Overzicht') }}
        </h2>
    </x-slot>
    <link href="{{ asset('css/faq/style.css') }}" rel="stylesheet">
    <div class="faq-container">
        @foreach($categories as $category)
            <div class="blok1">
                <button class="knop1" onclick="toggleVragen(this)">
                    {{ $category->name }}
                </button>
                <div class="blok2 gesloten">
                    @foreach($category->questions as $question)
                        <div class="blok3">
                            <button class="knop2" onclick="toggleAntwoord(this)">
                                {{ $question->question }}
                            </button>
                            <div class="blok4 verborgen">
                                {{ $question->answer }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

<script>
    function toggleVragen(button) {
        const vragen = button.nextElementSibling;
        vragen.classList.toggle('gesloten');
    }

    function toggleAntwoord(button) {
        const antwoord = button.nextElementSibling;
        antwoord.classList.toggle('verborgen');
    }
</script>
