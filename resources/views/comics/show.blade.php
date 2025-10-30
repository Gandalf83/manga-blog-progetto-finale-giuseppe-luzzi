@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1>{{ $comic->title }}</h1>

    @if($comic->cover)
        <img src="{{ asset('storage/' . $comic->cover) }}" alt="{{ $comic->title }}" class="img-fluid mb-3" style="max-width: 300px;">
    @endif

    <p><strong>Numero:</strong> {{ $comic->number }}</p>
    <p><strong>Anno:</strong> {{ $comic->year }}</p>
    <p><strong>Categoria:</strong> {{ $comic->category->name ?? 'N/A' }}</p>
    <p><strong>Trama:</strong> {{ $comic->plot }}</p>

    <a href="{{ route('comics.index') }}" class="btn btn-secondary mt-3">⬅️ Torna alla lista</a>
</div>
@endsection
