<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'image_path',
        'user_id',
        'file_path',
        'categorie_id',
        'description',
        'file_path'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }
}
