@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">📚 Lista dei Fumetti</h1>
        <a href="{{ route('comics.create') }}" class="btn btn-primary">➕ Aggiungi fumetto</a>
    </div>

    {{-- Messaggio di successo --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($comics->count() > 0)
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        
                        {{-- ✅ Immagine copertina --}}
                        @if($comic->cover && file_exists(public_path($comic->cover)))

                         <img src="{{ asset('uploads/' . basename($comic->cover)) }}" class="card-img-top" alt="{{ $comic->title }}">


                          @else

                            <img src="https://via.placeholder.com/300x400?text=Nessuna+Copertina" 
                                 class="card-img-top" 
                                 alt="Nessuna copertina">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <p class="card-text">{{ Str::limit($comic->plot, 100) }}</p>
                            <p><strong>Anno:</strong> {{ $comic->year }}</p>
                            <p><strong>Categoria:</strong> {{ $comic->category->name ?? 'N/A' }}</p>

                            <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-info btn-sm">🔍 Dettagli</a>
                            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning btn-sm">✏️ Modifica</a>
                        </div>

                        <div class="card-footer text-center">
                            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Vuoi davvero eliminare questo fumetto?')">
                                        🗑️ Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center mt-4">📭 Nessun fumetto trovato. 
            <a href="{{ route('comics.create') }}">Aggiungine uno!</a>
        </p>
    @endif
</div>
@endsection
