@extends('layouts.app')

@section('title', 'Crea Manga')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">➕ Aggiungi un nuovo Manga</h1>

    {{-- Mostra eventuali errori di validazione --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form creazione nuovo manga --}}
    <form action="{{ route('mangas.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 bg-light rounded">
        @csrf

        {{-- Titolo --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Titolo</label>
            <input type="text" name="title" class="form-control" 
                   value="{{ old('title') }}" required>
        </div>

        {{-- Autore --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Autore</label>
            <input type="text" name="author" class="form-control" 
                   value="{{ old('author') }}" required>
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Descrizione</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
        </div>

        {{-- Anno --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Anno</label>
            <input type="number" name="year" class="form-control" 
                   value="{{ old('year') }}" 
                   min="1900" max="{{ date('Y') }}" required>
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Categoria</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Immagine --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Immagine (opzionale)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Carica un file JPG, PNG o WEBP. Verrà salvato in <code>storage/uploads</code>.</small>
        </div>

        {{-- Pulsante --}}
        <button type="submit" class="btn btn-success w-100">💾 Salva Manga</button>
    </form>
</div>
@endsection
