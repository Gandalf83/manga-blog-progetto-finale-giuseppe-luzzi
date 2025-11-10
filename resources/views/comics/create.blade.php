@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Aggiungi Nuovo Manga</h1>

    <form action="{{ route('mangas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">URL Immagine</label>
            <input type="text" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-success">Salva Manga</button>
        <a href="{{ route('mangas.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
