<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Contact') }}
        </h2>
    </x-slot>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="content">
        <div class="container">
            <div class="form-container">
                <form method="POST" action="/contact">
                    @csrf

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Bericht</label>
                        <textarea name="message" id="message" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit">Verstuur Bericht</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
