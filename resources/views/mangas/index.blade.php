
@extends('layouts.app')

@section('title', 'Lista Manga')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Lista dei Manga</h1>

    <div class="row">
        @foreach ($mangas as $manga)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">

                    {{-- Immagine del manga --}}
                    @if ($manga->image)
                        <img src="{{ asset('uploads/' . $manga->image) }}" 
                             alt="{{ $manga->title }}" 
                             class="card-img-top"
                             style="object-fit: cover; height: 400px;">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" 
                             alt="Nessuna immagine" 
                             class="card-img-top"
                             style="object-fit: cover; height: 400px;">
                    @endif

                    {{-- Corpo della card --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $manga->title }}</h5>
                        <p class="card-text"><strong>Autore:</strong> {{ $manga->author }}</p>
                        <p class="card-text">{{ Str::limit($manga->description, 120) }}</p>
                        <p class="card-text"><strong>Anno:</strong> {{ $manga->year }}</p>

                        <a href="{{ route('mangas.show', $manga->id) }}" 
                           class="btn btn-primary mt-2 w-100">
                            Vedi Dettagli
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
