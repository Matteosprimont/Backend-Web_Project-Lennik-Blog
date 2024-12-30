<x-app-layout>
    <x-slot name="header">
        <h2 class="faq-title">FAQ</h2>
    </x-slot>
    <link href="{{ asset('css/faq/faq.css') }}" rel="stylesheet">
    <div class="faq-container">
        @foreach($categories as $category)
            <h3 class="category-title">{{ $category->name }}</h3>
            <ul class="category-list">
                @foreach($category->questions as $question)
                    <li class="category-item">
                        <strong class="faq-question">{{ $question->question }}</strong><br>
                        <span class="faq-answer">{{ $question->answer }}</span>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
</x-app-layout>
