<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorie Bewerken: ') . $category->name }}
        </h2>
    </x-slot>

    <link href="{{ asset('css/faq/style.css') }}" rel="stylesheet">

    <div class="faq-container">
        <form method="POST" action="{{ route('faq.category.update', $category->id) }}">
            @csrf
            @method('PATCH')
            <label>Categorie Naam:</label>
            <input type="text" name="name" value="{{ $category->name }}" class="button1">
            <button type="submit" class="button2">Categorie Bijwerken</button>
        </form>

        <form method="POST" action="{{ route('faq.category.delete', $category->id) }}" style="margin-top: 10px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="button2 delete-button">Categorie Verwijderen</button>
        </form>
        <hr class="divider">
        @foreach($category->questions as $question)
            <div class="block3">
                <form method="POST" action="{{ route('faq.question.update', $question->id) }}">
                    @csrf
                    @method('PATCH')
                    <label>Vraag:</label>
                    <input type="text" name="question" value="{{ $question->question }}" class="button1">
                    <label>Antwoord:</label>
                    <textarea name="answer" class="button1">{{ $question->answer }}</textarea>
                    <button type="submit" class="button2">Vraag Bijwerken</button>
                </form>
                <form method="POST" action="{{ route('faq.question.delete', $question->id) }}" style="margin-top: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button2 delete-button">Vraag Verwijderen</button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
