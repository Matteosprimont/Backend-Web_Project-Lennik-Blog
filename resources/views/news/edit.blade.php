<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Bewerk Nieuws') }}
        </h2>
    </x-slot>
    <link href="{{ asset('css/admin/edit.css') }}" rel="stylesheet">
    <div class="content">
        <div class="container">
            <div class="form-container">
                <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="title">{{ __('Titel') }}</label>
                        <input type="text" name="title" id="title" value="{{ $news->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea name="content" id="content" required>{{ $news->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">{{ __('Afbeelding (optioneel)') }}</label>
                        <input type="file" name="image" id="image">
                        @if ($news->image)
                            <p>{{ __('Huidige afbeelding:') }}</p>
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="current-image">
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit">{{ __('Opslaan') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
