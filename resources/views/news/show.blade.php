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
                <h3 class="article-title">{{ $news->title }}</h3>
                <p class="article-date">{{ $news->publication_date }}</p>

                @if ($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="article-image">
                @endif

                <p class="article-content">{{ $news->content }}</p>

                @if(auth()->user()->is_admin)
                    <div class="article-actions">
                        <a href="{{ route('admin.news.edit', $news->id) }}">{{ __('Bewerk Nieuws') }}</a>
                        <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">{{ __('Verwijder Nieuws') }}</button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="comments-section">
                <h3 class="comments-title">{{ __('Comments') }}</h3>
                <form action="{{ route('news.comment.store', $news->id) }}" method="POST" class="comment-form">
                    @csrf
                    <textarea name="content" rows="2" placeholder="{{ __('Type je comment hier...') }}" required></textarea>
                    <button type="submit">{{ __('Comment') }}</button>
                </form>
                <ul class="comments-list">
                    @forelse ($news->comments as $comment)
                        <li class="comment-item">
                            <div class="comment-header">
                                <span class="comment-user">{{ $comment->user->name }}</span>
                                <span class="comment-date">{{ $comment->created_at->format('d-m-Y H:i') }}</span>
                            </div>
                            <div class="comment-content">{{ $comment->content }}</div>
                        </li>
                    @empty
                        <p>{{ __('Geen comments beschikbaar.') }}</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>