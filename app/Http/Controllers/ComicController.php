<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    // Mostra la lista dei fumetti
    public function index()
    {
        $comics = Comic::with('category')->get();
        return view('comics.index', compact('comics'));
    }

    // Mostra il form per creare un nuovo fumetto
    public function create()
{
    $categories = \App\Models\Category::all();
    return view('comics.create', compact('categories'));
}


    // Salva un nuovo fumetto nel database
   public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|max:255',
        'plot' => 'required|string',
        'number' => 'required|integer',
        'year' => 'required|integer',
        'category_id' => 'required|integer',
        'cover' => 'nullable|image|max:2048', // 👈 nuova regola: deve essere immagine
    ]);

    // Se c'è un'immagine, salvala in storage/app/public/covers
    if ($request->hasFile('cover')) {
        $path = $request->file('cover')->store('covers', 'public');
        $data['cover'] = $path;
    }

    Comic::create($data);

    return redirect()->route('comics.index')->with('success', 'Fumetto aggiunto con successo!');
    }

    // Mostra i dettagli di un singolo fumetto
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    // Mostra il form per modificare un fumetto
    public function edit(Comic $comic)
    {
    $categories = \App\Models\Category::all();
    return view('comics.edit', compact('comic', 'categories'));
    }

    // Aggiorna un fumetto esistente
     public function update(Request $request, Comic $comic)
{
    $data = $request->validate([
        'title' => 'required|max:255',
        'plot' => 'nullable|string',
        'number' => 'nullable|integer',
        'year' => 'nullable|integer',
        'cover' => 'nullable|string',
        'category_id' => 'nullable|integer|exists:categories,id',
    ]);


        // Se carico una nuova immagine, cancella la vecchia e salva la nuova
        if ($request->hasFile('cover')) {
            if ($comic->cover) {
                Storage::disk('public')->delete($comic->cover);
            }
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $comic->update($data);

        return redirect()->route('comics.index')->with('success', 'Fumetto aggiornato con successo!');
    }

    // Elimina un fumetto
    public function destroy(Comic $comic)
    {
        if ($comic->cover) {
            Storage::disk('public')->delete($comic->cover);
        }

        $comic->delete();

        return redirect()->route('comics.index')->with('success', 'Fumetto eliminato con successo!');
    }
}
