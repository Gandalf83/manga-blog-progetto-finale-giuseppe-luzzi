<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;

// 🌟 Rotta principale → mostra la lista dei manga
Route::get('/', [MangaController::class, 'index'])->name('home');

// 🌟 CRUD Manga
Route::resource('mangas', MangaController::class);

// 🌟 CRUD Comics
Route::resource('comics', ComicController::class);

// 🌟 CRUD Categories (solo se ti serve per mostrare le categorie nel sito)
Route::resource('categories', CategoryController::class)->only(['index', 'show']);

// 🌟 Pagine statiche
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
