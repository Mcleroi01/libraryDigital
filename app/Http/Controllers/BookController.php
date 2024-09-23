<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['tags'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Categorie::all();
        return view('books.create', compact('tags', 'categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'tags' => 'array',
            'description' => 'nullable|string',
        ]);



        $bookData = [
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'description' => $validatedData['description'] ?? null,
            'user_id' => auth()->id(),
            'categorie_id' => $request['categories'],
        ];


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $bookData['image_path'] = $imagePath;
        }

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('pdfs', 'public');
            $bookData['file_path'] = $filePath;
        }
        $book = Book::create($bookData);

        if ($request->tags) {
            $book->tags()->sync($request->tags);
        }



        return redirect()->route('books.index')->with('success', 'Livre ajouté avec succès.');
    }



    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pdf_url' => 'required|url',
            'tags' => 'array',
            'categories' => 'array',
        ]);

        $book->update($request->all());
        $book->tags()->sync($request->tags);
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function readBook(Book $book)
    {
       return view('books.read',compact('book'));

    }
}
