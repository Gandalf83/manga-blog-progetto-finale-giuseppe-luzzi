@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>✏️ Modifica Manga</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $errore)
                    <li>{{ $errore }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mangas.update', $manga->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Titolo --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input 
                type="text" 
                name="title" 
                class="form-control" 
                value="{{ old('title', $manga->title) }}" 
                required>
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea 
                name="description" 
                class="form-control" 
                rows="4">{{ old('description', $manga->description) }}</textarea>
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select name="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option 
                        value="{{ $category->id }}" 
                        {{ $category->id == $manga->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Copertina attuale --}}
        @if($manga->cover && file_exists(public_path($manga->cover)))
            <div class="mb-3">
                <label class="form-label d-block">Copertina attuale</label>
                <img src="{{ asset('uploads/' . basename($manga->cover)) }}" 
                     alt="{{ $manga->title }}" 
                     class="img-thumbnail mb-2" 
                     style="max-width: 200px;">
            </div>
        @endif

        {{-- Nuova copertina --}}
        <div class="mb-3">
            <label for="cover" class="form-label">Nuova copertina (opzionale)</label>
            <input type="file" name="cover" class="form-control">
        </div>

        {{-- Pulsanti --}}
        <button type="submit" class="btn btn-success">💾 Aggiorna Manga</button>
        <a href="{{ route('mangas.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
