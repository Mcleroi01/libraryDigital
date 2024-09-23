<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'current_page',
        'pdf_url',
    ];
}
