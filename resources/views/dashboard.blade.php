<x-app-layout>
    <x-slot name="header">
        <h2 class="kop-dashboard">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <head>
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    </head>

    <div class="sectie-dashboard">
        <div class="container-dashboard">
            <div class="welkom-blok">
                <div class="welkom-tekst">
                    <h3 class="titel-dashboard">{{ __('Welkom op het Lennik platform!') }}</h3>
                    <p class="beschrijving-dashboard">{{ __('Hier vind je het laatste nieuws, evenementen, en activiteiten in Lennik.') }}</p>
                </div>
            </div>

            <div class="nieuws-blok">
                <div class="nieuws-tekst">
                    <h3 class="titel-nieuws">{{ __('Laatste Nieuws') }}</h3>
                    <div class="beschrijving-nieuws">
                        @if ($newsItems->isEmpty())
                            <p>{{ __('Er is momenteel geen nieuws beschikbaar.') }}</p>
                        @else
                            <ul class="nieuws-lijst">
                                @foreach ($newsItems as $news)
                                    <li class="nieuws-item">
                                        <h4 class="nieuws-titel">{{ $news->title }}</h4>
                                        <p class="nieuws-datum">{{ $news->publication_date }}</p>
                                        @if ($news->image)
                                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="nieuws-afbeelding">
                                        @endif
                                        <p class="nieuws-content">{{ Str::limit($news->content, 150) }}</p>
                                        <a href="{{ route('news.show', $news->id) }}" class="lees-meer-link">{{ __('Lees meer') }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="categorie-container">
                <div class="categorie-blok">
                    <div class="categorie-tekst">
                        <h4 class="titel-categorie">{{ __('Jobs in Lennik') }}</h4>
                        <p class="beschrijving-categorie">{{ __('Bekijk de laatste vacatures in Lennik.') }}</p>
                    </div>
                </div>

                <div class="categorie-blok">
                    <div class="categorie-tekst">
                        <h4 class="titel-categorie">{{ __('Evenementen in Lennik') }}</h4>
                        <p class="beschrijving-categorie">{{ __('Bekijk de komende evenementen in Lennik.') }}</p>
                    </div>
                </div>

                <div class="categorie-blok">
                    <div class="categorie-tekst">
                        <h4 class="titel-categorie">{{ __('Lokale Bedrijven') }}</h4>
                        <p class="beschrijving-categorie">{{ __('Bekijk de bedrijven die in Lennik gevestigd zijn.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>