@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h2 class="mb-0">{{ $manga->title }}</h2>
        </div>
        <div class="card-body">
            {{-- Copertina --}}
            @if($manga->cover && file_exists(public_path($manga->cover)))
                <img src="{{ asset('uploads/' . basename($manga->cover)) }}" 
                     alt="{{ $manga->title }}" 
                     class="img-fluid mb-3 rounded shadow-sm" 
                     style="max-width: 300px;">
            @else
                <img src="https://via.placeholder.com/300x400?text=Nessuna+Copertina" 
                     class="img-fluid mb-3 rounded" 
                     alt="Nessuna copertina disponibile">
            @endif

            <p><strong>📅 Anno:</strong> {{ $manga->year }}</p>
            <p><strong>📖 Numero:</strong> {{ $manga->number ?? 'N/A' }}</p>
            <p><strong>🏷️ Categoria:</strong> {{ $manga->category->name ?? 'Nessuna' }}</p>

            <hr>

            <h5>📝 Trama</h5>
            <p>{{ $manga->plot }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('mangas.edit', $manga->id) }}" class="btn btn-warning">✏️ Modifica</a>
            <a href="{{ route('mangas.index') }}" class="btn btn-secondary">↩️ Torna alla lista</a>
        </div>
    </div>
</div>
@endsection
