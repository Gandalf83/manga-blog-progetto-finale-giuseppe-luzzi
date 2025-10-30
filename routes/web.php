<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ComicController;

// ✅ Home: mostra la lista dei manga
Route::get('/', [MangaController::class, 'index'])->name('home');

// ✅ Rotte per i fumetti (vecchio modulo)
Route::resource('comics', ComicController::class);

// ✅ Rotte per i manga (nuovo modulo)
Route::resource('mangas', MangaController::class);
