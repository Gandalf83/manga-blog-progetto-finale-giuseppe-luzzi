<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MangaController extends Controller
{
    /**
     * Mostra tutti i manga
     */
    public function index()
    {
        $mangas = Manga::latest()->get();
        return view('mangas.index', compact('mangas'));
    }

    /**
     * Mostra il form per creare un nuovo manga
     */
    public function create()
    {
        $categories = Category::all();
        return view('mangas.create', compact('categories'));
    }

    /**
     * Salva un nuovo manga
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:10',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'category_id' => 'nullable|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $manga = new Manga($request->except('cover'));

        // ✅ Gestione immagine
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $manga->cover = 'uploads/' . $filename;
        }

        $manga->save();

        return redirect()->route('mangas.index')->with('success', 'Manga creato con successo!');
    }

    /**
     * Mostra un singolo manga
     */
    public function show(Manga $manga)
    {
        return view('mangas.show', compact('manga'));
    }

    /**
     * Mostra il form per modificare un manga
     */
    public function edit(Manga $manga)
    {
        $categories = Category::all();
        return view('mangas.edit', compact('manga', 'categories'));
    }

    /**
     * Aggiorna un manga esistente
     */
    public function update(Request $request, Manga $manga)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:10',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'category_id' => 'nullable|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $manga->fill($request->except('cover'));

        // ✅ Se arriva una nuova immagine, elimina la vecchia
        if ($request->hasFile('cover')) {
            if ($manga->cover && File::exists(public_path($manga->cover))) {
                File::delete(public_path($manga->cover));
            }

            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $manga->cover = 'uploads/' . $filename;
        }

        $manga->save();

        return redirect()->route('mangas.index')->with('success', 'Manga aggiornato correttamente!');
    }

    /**
     * Elimina un manga
     */
    public function destroy(Manga $manga)
    {
        // ✅ Elimina anche l’immagine se esiste
        if ($manga->cover && File::exists(public_path($manga->cover))) {
            File::delete(public_path($manga->cover));
        }

        $manga->delete();

        return redirect()->route('mangas.index')->with('success', 'Manga eliminato correttamente!');
    }
}
