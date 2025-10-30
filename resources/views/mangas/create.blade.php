@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">➕ Aggiungi un nuovo Manga</h1>

    {{-- Messaggi di errore --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form per aggiungere manga --}}
    <form action="{{ route('mangas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="plot" class="form-label">Trama</label>
            <textarea name="plot" id="plot" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="number" class="form-label">Numero</label>
            <input type="number" name="number" id="number" class="form-control" min="1">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Anno</label>
            <input type="number" name="year" id="year" class="form-control" min="1900" max="2099" required>
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Copertina (immagine)</label>
            <input type="file" name="cover" id="cover" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Salva</button>
        <a href="{{ route('mangas.index') }}" class="btn btn-secondary">↩️ Torna indietro</a>
    </form>
</div>
@endsection
