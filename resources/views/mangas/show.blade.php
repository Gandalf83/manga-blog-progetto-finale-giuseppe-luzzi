@extends('layouts.app')

@section('title', $manga->title)

@section('content')
<div class="container mt-5">
    <div class="card mx-auto shadow-lg border-0 rounded-4" style="max-width: 700px;">
        
        {{-- Immagine del manga --}}
        @if($manga->image)
            <img src="{{ asset('uploads/' . $manga->image) }}" 
                 class="card-img-top rounded-top-4" 
                 alt="{{ $manga->title }}"
                 style="object-fit: cover; height: 400px;">
        @else
            <img src="{{ asset('images/default.jpg') }}" 
                 class="card-img-top rounded-top-4" 
                 alt="Immagine non disponibile"
                 style="object-fit: cover; height: 400px;">
        @endif

        {{-- Contenuto --}}
        <div class="card-body text-center">
            <h2 class="card-title mb-3">{{ $manga->title }}</h2>

            <ul class="list-unstyled mb-3">
                <li><strong>Autore:</strong> {{ $manga->author }}</li>
                <li><strong>Anno:</strong> {{ $manga->year }}</li>
                <li><strong>Categoria:</strong> {{ $manga->category->name ?? 'N/A' }}</li>
            </ul>

            <hr>

            <p class="card-text px-3 text-justify">
                {{ $manga->description }}
            </p>
        </div>

        {{-- Footer con bottoni --}}
        <div class="card-footer bg-light text-center rounded-bottom-4">
            <a href="{{ route('mangas.index') }}" class="btn btn-secondary me-2">⬅ Torna alla lista</a>
            <a href="{{ route('mangas.edit', $manga->id) }}" class="btn btn-warning">✏️ Modifica</a>
        </div>
    </div>
</div>
@endsection
