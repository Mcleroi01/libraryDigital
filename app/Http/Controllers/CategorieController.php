<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Categorie::create($request->all());
        return redirect()->route('categories.index');
    }

    public function show(Categorie $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Categorie $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Categorie $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Categorie $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
