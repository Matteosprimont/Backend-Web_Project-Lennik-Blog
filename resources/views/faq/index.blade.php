<x-app-layout>
    <x-slot name="header">
        <h2 class="faq-title">{{ __('Veelgestelde Vragen') }}</h2>
    </x-slot>

    <link href="{{ asset('css/faq/faq1.css') }}" rel="stylesheet">

    <div class="faq-container">
        <p class="faq-intro">{{ __('Heb je een vraag? Vind hier de antwoorden op de meest gestelde vragen!') }}</p>
        @foreach($categories as $category)
            <div class="faq-block">
                <button class="faq-category-button" onclick="toggleCategory(this)">
                    {{ $category->name }}
                </button>
                <div class="faq-questions hidden">
                    @foreach($category->questions as $question)
                        <div class="faq-question-block">
                            <button class="faq-question-button" onclick="toggleAnswer(this)">
                                {{ $question->question }}
                            </button>
                            <div class="faq-answer hidden">
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
    function toggleCategory(button) {
        const questions = button.nextElementSibling;
        questions.classList.toggle('hidden');
    }

    function toggleAnswer(button) {
        const answer = button.nextElementSibling;
        answer.classList.toggle('hidden');
    }
</script>
