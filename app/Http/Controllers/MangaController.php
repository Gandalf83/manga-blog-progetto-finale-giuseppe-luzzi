<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Category; // ✅ serve per caricare le categorie
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::with('category')->get(); // ✅ includiamo la relazione
        return view('mangas.index', compact('mangas'));
    }

    public function create()
    {
        $categories = Category::all(); // ✅ passiamo le categorie alla view
        return view('mangas.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id', // ✅ validazione categoria
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] = 'storage/' . $path;
        }

        Manga::create($data);
        return redirect()->route('mangas.index')->with('success', 'Manga creato con successo!');
    }

    public function show(Manga $manga)
    {
        return view('mangas.show', compact('manga'));
    }

    public function edit(Manga $manga)
    {
        $categories = Category::all(); // ✅ necessario anche qui
        return view('mangas.edit', compact('manga', 'categories'));
    }

    public function update(Request $request, Manga $manga)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $manga->update($data);
        return redirect()->route('mangas.index')->with('success', 'Manga aggiornato con successo!');
    }

    public function destroy(Manga $manga)
    {
        $manga->delete();
        return redirect()->route('mangas.index')->with('success', 'Manga eliminato con successo!');
    }
}
