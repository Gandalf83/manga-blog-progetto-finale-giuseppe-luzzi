@extends('layouts.app')

@section('title', 'Chi Siamo')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Chi Siamo</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="lead text-center">
                Benvenuti nel nostro blog dedicato al mondo dei manga! 📚
            </p>
            <p>
                La nostra missione è condividere la passione per la cultura giapponese e raccontare
                i manga più amati di sempre, dai grandi classici alle nuove uscite.
            </p>
            <p>
                Questo progetto è stato realizzato con <strong>Laravel</strong>, un framework moderno ed elegante
                per lo sviluppo di applicazioni web.
            </p>

            <div class="text-center mt-4">
                <a href="{{ route('mangas.index') }}" class="btn btn-outline-primary">
                    Vai alla lista dei manga
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
