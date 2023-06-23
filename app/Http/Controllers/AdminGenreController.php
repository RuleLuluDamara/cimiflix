<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.genres.index', [
            'genres' => Genre::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.genres.create', [
            'genres' => Genre::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $validatedData['slug'] = Str::slug($request->name);

        Genre::create($validatedData);

        return redirect('/dashboard/genres')->with('success', 'New Genres had been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('dashboard.genres.show', [
            'genre' => $genre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        $genre = Genre::where('slug', $genre->slug)->first();

        if (!$genre) {
            abort(404); // Handle the case where the genre is not found
        }
        return view('dashboard.genres.edit', [
            'genre' => $genre,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        Genre::where('id', $genre->id)
            ->update($validatedData);

        return redirect('/dashboard/genres')->with('success', 'Genre has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect('/dashboard/genres')->with('success', 'Genre had been deleted');
    }
}