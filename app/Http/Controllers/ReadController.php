<?php

namespace App\Http\Controllers;

use App\Models\Read;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReadRequest;
use App\Http\Requests\UpdateReadRequest;

class ReadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function saveCurrentPage(Request $request){
        Read::updateOrCreate([
            'book_id'=> $request->book_id,
            'user_id'=> Auth::id(),
            'current_page'=> $request->current_page,
            'pdf_url'=> null,
        ]);

        return response()->json(['success' => true]);
    }
}
