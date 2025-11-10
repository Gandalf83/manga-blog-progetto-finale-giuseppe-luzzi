<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Mostra la lista di categorie (con il conteggio dei manga)
     */
    public function index()
    {
        $categories = Category::withCount('mangas')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Mostra il dettaglio di una categoria e i manga collegati
     */
    public function show(Category $category)
    {
        // carichiamo i manga collegati
        $category->load('mangas');
        return view('categories.show', compact('category'));
    }
}
