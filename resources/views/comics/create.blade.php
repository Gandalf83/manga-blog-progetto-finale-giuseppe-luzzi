@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1>Aggiungi un nuovo fumetto</h1>

    <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Trama</label>
            <textarea name="plot" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Numero</label>
            <input type="number" name="number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Anno</label>
            <input type="number" name="year" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Copertina</label>
            <input type="file" name="cover" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">💾 Salva fumetto</button>
        <a href="{{ route('comics.index') }}" class="btn btn-secondary">⬅️ Torna indietro</a>
    </form>
</div>
@endsection
