<?php

namespace App\Http\Controllers;

use App\Models\Read;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReadRequest;
use App\Http\Requests\UpdateReadRequest;

class ReadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function readBook($id)
    {

        $book = Book::findOrFail($id);
        $user = Auth::user();
        $read = Read::where('user_id', $user->id)->where('book_id', $book->id)->first();


        if (!$read) {
            $read = Read::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'current_page' => 1,
            ]);
        }



        return view('books.read', compact('book', 'read'));
    }


    public function updateProgress(Request $request, $id)
    {
        $user = Auth::user();
        $book = Book::findOrFail($id);
        $read = Read::where('user_id', $user->id)->where('book_id', $book->id)->firstOrFail();


        $read->current_page = $request->input('current_page');
        $read->save();

        return response()->json(['success' => true]);
    }
}
