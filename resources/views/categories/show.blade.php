@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container">
    <h1 class="text-center mb-5 fw-bold text-primary">{{ $category->name }}</h1>
    <p class="text-center text-muted mb-4">{{ $category->description ?? 'Nessuna descrizione disponibile per questa categoria.' }}</p>

    <div class="row justify-content-center">
        @forelse ($category->mangas as $manga)
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    @if($manga->cover)
                        <img src="{{ $manga->cover }}" class="card-img-top" alt="{{ $manga->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $manga->title }}</h5>
                        <p class="card-text"><strong>Autore:</strong> {{ $manga->author }}</p>
                        <p class="text-muted small">{{ Str::limit($manga->description, 100) }}</p>
                        <a href="{{ route('mangas.show', $manga) }}" class="btn btn-outline-primary btn-sm">Dettagli</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-secondary">Nessun manga presente in questa categoria.</p>
        @endforelse
    </div>
</div>
@endsection
