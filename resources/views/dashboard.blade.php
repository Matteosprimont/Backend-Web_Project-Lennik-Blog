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
            <div class="linker-container">
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
                                            <p class="nieuws-content">{{ Str::limit($news->content, 90) }}</p>
                                            <a href="{{ route('news.show', $news->id) }}" class="lees-meer-link">{{ __('Lees meer') }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="rechter-container">
                <div class="zoekbalk-container">
                    <input type="text" id="search-bar" placeholder="{{ __('Zoek gebruikers...') }}" class="zoekbalk" oninput="filterUsers()">
                </div>

                <div class="gebruikers-lijst-container">
                    <h3 class="titel-gebruikers">{{ __('Lijst van Gebruikers') }}</h3>
                    <ul id="gebruikers-lijst" class="gebruikers-lijst">
                        @foreach ($users as $user)
                            <li class="gebruiker-item">{{ $user->name }} ({{ $user->email }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterUsers() {
            const searchInput = document.getElementById('search-bar').value.toLowerCase();
            const userItems = document.querySelectorAll('.gebruiker-item');

            userItems.forEach(item => {
                if (item.textContent.toLowerCase().includes(searchInput)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</x-app-layout>
