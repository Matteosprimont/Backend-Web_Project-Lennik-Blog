<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Nieuws: ' . $news->title) }}
        </h2>
    </x-slot>
    
    <link href="{{ asset('css/admin/show.css') }}" rel="stylesheet">

    <div class="content">
        <div class="container">
            <div class="article">
                <div class="article-text">
                    <h3 class="article-title">{{ $news->title }}</h3>
                    <p class="article-date">{{ $news->publication_date }}</p>

                    @if ($news->image)
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="article-image">
                    @endif

                    <p class="article-content">{{ $news->content }}</p>

                    @if(auth()->user()->is_admin)
                        <div class="article-actions">
                            <a href="{{ route('admin.news.edit', $news->id) }}">Bewerk Nieuws</a>
                            <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">{{ __('Verwijder Nieuws') }}</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
