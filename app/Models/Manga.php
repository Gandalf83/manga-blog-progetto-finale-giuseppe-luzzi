<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; // 🔹 aggiunto import corretto

class Manga extends Model
{
    use HasFactory;

    // Campi riempibili (per form, seeder, ecc.)
    protected $fillable = [
        'title',
        'author',
        'description',
        'year',
        'image',
        'category_id',
    ];

    // Relazione: un Manga appartiene a una Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
