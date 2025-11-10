@extends('layouts.app')

@section('title', 'Categorie')

@section('content')
<div class="container">
    <h1 class="text-center mb-5 fw-bold text-primary">Categorie dei Manga</h1>

    <div class="row justify-content-center">
        @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark">{{ $category->name }}</h5>
                        <p class="text-muted mb-2">{{ $category->description ?? 'Nessuna descrizione disponibile.' }}</p>
                        <p class="small text-secondary">
                            <strong>{{ $category->mangas_count }}</strong> Manga
                        </p>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-primary btn-sm">Vedi Manga</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
