<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Nieuws: ' . $news->title) }}
        </h2>
    </x-slot>
    
    <link href="{{ asset('css/admin/show.css') }}" rel="stylesheet">
    <div class="return-button-wrapper">
        <a href="{{ route('dashboard') }}" class="return-button">Terug naar Dashboard</a>
    </div>

    <div class="content">
        <div class="container">
            <div class="article">
                <h3 class="article-title">{{ $news->title }}</h3>
                <p class="article-date">{{ $news->publication_date }}</p>

                @if ($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="article-image">
                @endif

                <div class="article-content">{!! $news->content !!}</div>

                @if(auth()->check() && auth()->user()->is_admin)
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
                <h3 class="comments-title">Commentaar</h3>
                
                <form method="POST" action="{{ route('news.comment.store', $news->id) }}" class="comment-form">
                    @csrf
                    <textarea name="content" placeholder="Schrijf een comment..." required></textarea>
                    <button type="submit">Plaatsen</button>
                </form>

                <ul class="comments-list">
                    @foreach ($news->comments->where('parent_id', null) as $comment)
                        <li class="comment-item">
                            <div class="comment-header">
                                <a href="{{ route('profile.show', $comment->user->id) }}" class="comment-user">
                                    {{ $comment->user->name }}
                                </a>
                                <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="comment-content">
                                {{ $comment->content }}
                            </div>
                            <div class="comment-actions">
                                <button onclick="toggleReplyForm('{{ $comment->id }}')">Reageer</button>
                            </div>

                            <form method="POST" action="{{ route('comments.reply', $comment->id) }}" class="reply-form" id="reply-form-{{ $comment->id }}" style="display:none;">
                                @csrf
                                <textarea name="content" placeholder="Type je antwoord hier..." rows="2" required></textarea>
                                <button type="submit">Plaatsen</button>
                            </form>

                            @foreach ($comment->replies as $reply)
                                <div class="comment-item nested">
                                    <div class="comment-header">
                                        <a href="{{ route('profile.show', $reply->user->id) }}" class="comment-user">
                                            {{ $reply->user->name }}
                                        </a>
                                        <span class="comment-date">{{ $reply->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="comment-content">
                                        {{ $reply->content }}
                                    </div>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        <script>
            function toggleReplyForm(commentId) {
                const form = document.getElementById(`reply-form-${commentId}`);
                form.style.display = form.style.display === 'none' ? 'block' : 'none';
            }
        </script>
</x-app-layout>
