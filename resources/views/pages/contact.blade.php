@extends('layouts.app')

@section('title', 'Contatti')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Contattaci</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <p class="lead text-center mb-5">
        Hai domande o vuoi collaborare con noi? Scrivici pure!
    </p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Inserisci il tuo nome" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Inserisci la tua email" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Messaggio</label>
                    <textarea id="message" name="message" class="form-control" rows="4" placeholder="Scrivi il tuo messaggio..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Invia</button>
            </form>
        </div>
    </div>
</div>
@endsection
