@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">✏️ Modifica fumetto</h1>

    {{-- Messaggi di errore --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comics.update', $comic->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $comic->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="plot" class="form-label">Trama</label>
            <textarea name="plot" id="plot" class="form-control" rows="4">{{ old('plot', $comic->plot) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="number" class="form-label">Numero</label>
            <input type="number" name="number" id="number" class="form-control" value="{{ old('number', $comic->number) }}">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Anno</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $comic->year) }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">-- Seleziona categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $comic->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label">Copertina (URL)</label>
            <input type="text" name="cover" id="cover" class="form-control" value="{{ old('cover', $comic->cover) }}">
            @if ($comic->cover)
                <img src="{{ $comic->cover }}" alt="{{ $comic->title }}" class="img-fluid mt-2" width="200">
            @endif
        </div>

        <button type="submit" class="btn btn-success">💾 Salva modifiche</button>
        <a href="{{ route('comics.index') }}" class="btn btn-secondary">⬅️ Torna indietro</a>
    </form>
</div>
@endsection
