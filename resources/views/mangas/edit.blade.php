@extends('layouts.app')

@section('title', 'Modifica Manga')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">✏️ Modifica Manga</h1>

    {{-- Messaggi di successo o errore --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form di modifica --}}
    <form action="{{ route('mangas.update', $manga->id) }}" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-light rounded">
        @csrf
        @method('PUT')

        {{-- Titolo --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Titolo</label>
            <input type="text" name="title" class="form-control" 
                   value="{{ old('title', $manga->title) }}" required>
        </div>

        {{-- Autore --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Autore</label>
            <input type="text" name="author" class="form-control" 
                   value="{{ old('author', $manga->author) }}" required>
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Descrizione</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $manga->description) }}</textarea>
        </div>

        {{-- Anno --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Anno</label>
            <input type="number" name="year" class="form-control" 
                   value="{{ old('year', $manga->year) }}" 
                   min="1900" max="{{ date('Y') }}" required>
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Categoria</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ $manga->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Immagine attuale --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Immagine attuale</label><br>
            @if($manga->image)
                <img src="{{ asset('uploads/' . $manga->image) }}" 
                     alt="{{ $manga->title }}" 
                     class="img-thumbnail mb-2" width="150">
            @else
                <p class="text-muted">Nessuna immagine presente.</p>
            @endif
        </div>

        {{-- Sostituisci immagine --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Sostituisci immagine (opzionale)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Se carichi una nuova immagine, quella vecchia verrà sostituita.</small>
        </div>

        {{-- Pulsante salva --}}
        <button type="submit" class="btn btn-warning w-100">💾 Aggiorna Manga</button>
    </form>
</div>
@endsection
