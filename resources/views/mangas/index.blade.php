@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">📚 Lista dei Manga</h1>
        <a href="{{ route('mangas.create') }}" class="btn btn-primary">➕ Aggiungi manga</a>
    </div>

    {{-- Messaggio di successo --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($mangas->count() > 0)
        <div class="row">
            @foreach ($mangas as $manga)
               <div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm d-flex flex-column">

        {{-- ✅ Immagine copertina --}}
        @if($manga->cover && file_exists(public_path($manga->cover)))
            <img src="{{ asset('uploads/' . basename($manga->cover)) }}" 
                 class="card-img-top object-fit-cover" 
                 alt="{{ $manga->title }}" 
                 style="height: 300px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x400?text=Nessuna+Copertina" 
                                 class="card-img-top" 
                                 alt="Nessuna copertina">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $manga->title }}</h5>
                            <p class="card-text">{{ Str::limit($manga->plot, 100) }}</p>
                            <p><strong>Anno:</strong> {{ $manga->year }}</p>
                            <p><strong>Categoria:</strong> {{ $manga->category->name ?? 'N/A' }}</p>

                            <a href="{{ route('mangas.show', $manga->id) }}" class="btn btn-info btn-sm">🔍 Dettagli</a>
                            <a href="{{ route('mangas.edit', $manga->id) }}" class="btn btn-warning btn-sm">✏️ Modifica</a>
                        </div>

                        <div class="card-footer text-center">
                            <form action="{{ route('mangas.destroy', $manga->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Vuoi davvero eliminare questo manga?')">
                                        🗑️ Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center mt-4">📭 Nessun manga trovato. 
            <a href="{{ route('mangas.create') }}">Aggiungine uno!</a>
        </p>
    @endif
</div>
@endsection
