<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\MovieStatuses;
use App\Models\RatingUmur;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.movies.index', [
            //'movies' => Movie::where('user_id', auth()->user()->id)->get()
            'movies' => Movie::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.movies.create', [
            'genres' => Genre::all(),
            'rating_umurs' => RatingUmur::all(),
            'statuses' => MovieStatuses::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return ($request);
        //dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'rilis' => 'nullable',
            'resolusi' => 'nullable',
            'durasi' => 'nullable',
            'director' => 'nullable',
            'studio_production' => 'nullable',
            'genre_id' => 'required',
            'rating_umur_id' => 'required',
            'status_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($request->name);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('movie-images');
        }
        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['excerpt'] = Str::limit($request->body, 100);

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
            'genres' => Genre::all(),
            'movies' => Movie::all(),
            'rating_umurs' => RatingUmur::all(),
            'statuses' => MovieStatuses::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //dd($request);

        $rules = [
            'name' => 'required|max:255',
            'rilis' => 'nullable',
            'resolusi' => 'nullable',
            'durasi' => 'nullable',
            'director' => 'nullable',
            'studio_production' => 'nullable',
            'genre_id' => 'required',
            'rating_umur_id' => 'required',
            'status_id' => 'required',
            'image' => 'nullable|image|file|max:1024',
            'body' => 'required',
        ];

        $validatedData = $request->validate($rules);
        //dd($validatedData);
        $validatedData['slug'] = Str::slug($validatedData['name']);

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
    public function dashboardIndex(Request $request)
    {
        return view('dashboard.index');
    }
}