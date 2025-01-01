<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ Beheer - Overzicht') }}
        </h2>
    </x-slot>

    <link href="{{ asset('css/faq/style.css') }}" rel="stylesheet">

    <div class="faq-container">
        @foreach($categories as $category)
            <div class="block1">
            <div class="block1">
    <a href="{{ route('faq.category.edit', $category->id) }}" class="knop1">
        {{ $category->name }}
    </a>
            </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
