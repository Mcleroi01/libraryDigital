<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ReadController;
use App\Models\Book;

Route::get('/', function () {
    $books = Book::with(['tags'])->get();
    return view('welcome', compact('books'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/books/{id}/read', [ReadController::class, 'readBook'])->name('books.read');
    Route::post('/books/{id}/update-progress', [ReadController::class, 'updateProgress'])->name('books.updateProgress');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/pdf/save', [ReadController::class, 'saveCurrentPage'])->name('savePage');
    Route::resource('books', BookController::class);
    Route::resource('tags', TagController::class);
    Route::resource('categories', CategorieController::class);
});

require __DIR__ . '/auth.php';
