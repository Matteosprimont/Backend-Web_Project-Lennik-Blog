<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header-title">
            {{ __('Voeg Nieuws Toe') }}
        </h2>
    </x-slot>
    
    <link href="{{ asset('css/admin/form.css') }}" rel="stylesheet">
    
    <div class="content-section">
        <div class="form-container">
            <div class="form-card">
                <div class="form-content">
                    <h3 class="form-title">{{ __('Nieuws Toevoegen') }}</h3>
                    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="label">{{ __('Titel') }}</label>
                            <input type="text" id="title" name="title" class="input-field" required />
                            <x-input-error :messages="$errors->get('title')" class="error-message" />
                        </div>

                        <div class="form-group">
                            <label for="content" class="label">{{ __('Content') }}</label>
                            <textarea id="content" name="content" class="input-field" required rows="4"></textarea>
                            <x-input-error :messages="$errors->get('content')" class="error-message" />
                        </div>

                        <div class="form-group">
                            <label for="image" class="label">{{ __('Afbeelding (optioneel)') }}</label>
                            <input type="file" id="image" name="image" class="input-field" accept="image/*" />
                            <x-input-error :messages="$errors->get('image')" class="error-message" />
                        </div>

                        <div class="form-submit">
                            <x-primary-button>{{ __('Nieuws Toevoegen') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
