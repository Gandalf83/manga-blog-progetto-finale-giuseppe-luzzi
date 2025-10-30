<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $table = 'comics'; // nome tabella nel database

    protected $fillable = [
        'title',
        'plot',
        'number',
        'year',
        'cover',
        'category_id',
        'user_id',
    ];

    // Relazione: un fumetto appartiene a un utente (fumettista)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relazione: un fumetto appartiene a una categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}