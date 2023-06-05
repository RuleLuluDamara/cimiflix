<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.movies.index', [
            'movies' => Movie::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.movies.create', [
            'genres' => Genre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return ($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:movies',
            // 'rilis' => 'required',
            // 'resolusi' => 'required',
            // 'durasi' => 'required',
            // 'director' => 'required',
            // 'studio_production' => 'required',
            'genre_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('movie-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit($request->body, 100);

        Movie::create($validatedData);

        return redirect('/dashboard/movies')->with('success', 'New movie had been added');
    }


    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('dashboard.movies.show', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('dashboard.movies.edit', [
            'movie' => $movie,
            'genres' => Genre::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $rules = [
            'name' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ];


        if ($request->slug != $movie->slug) {
            $rules['slug'] = 'required|unique:movies';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('movie-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($request->body, 100);

        Movie::where('id', $movie->id)
            ->update($validatedData);

        return redirect('/dashboard/movies')->with('success', 'Movie has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->image) {
            Storage::delete($movie->image);
        }
        Movie::destroy($movie->id);

        return redirect('/dashboard/movies')->with('success', 'Movie had been deleted');

    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Movie::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
    public function dashboardIndex(Request $request)
    {
        return view('dashboard.index');
    }
}