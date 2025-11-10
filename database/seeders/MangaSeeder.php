<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manga;
use App\Models\Category;

class MangaSeeder extends Seeder
{
    public function run(): void
    {
        // Prendiamo la prima categoria disponibile (creata da CategorySeeder)
        $category = Category::first();

        // Se non esiste nessuna categoria, la creiamo
        if (!$category) {
            $category = Category::create(['name' => 'Shonen']);
        }

        Manga::create([
            'title' => 'Leo',
            'author' => 'Giuseppe Studios',
            'description' => 'La storia di un giovane con un grande sogno e un sorriso che ispira coraggio.',
            'year' => 2020,
            'image' => 'uploads/leo.jpg',
            'category_id' => $category->id, // 👈 Campo obbligatorio
        ]);

        Manga::create([
            'title' => 'Luna',
            'author' => 'Giuseppe Editore',
            'description' => 'Un viaggio tra le stelle e il destino di una ragazza misteriosa.',
            'year' => 2022,
            'image' => 'uploads/luna.jpg',
            'category_id' => $category->id,
        ]);
    }
}
