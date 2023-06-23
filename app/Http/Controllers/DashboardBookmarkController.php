<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Movie;
use App\Models\Genre;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardBookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.bookmarks.index', [
            'bookmarks' => Bookmark::where('user_id', auth()->user()->id)->get(),
            //'bookmarks' => Bookmark::all(),
            'movies' => Movie::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('dashboard.movies.create', [
        //     'genres' => Genre::all(),
        //     'rating_umurs' => RatingUmur::all(),
        //     'statuses' => MovieStatuses::all()
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return ($request);
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'slug' => 'required|unique:movies',
        //     'rilis' => 'nullable',
        //     'resolusi' => 'nullable',
        //     'durasi' => 'nullable',
        //     'director' => 'nullable',
        //     'studio_production' => 'nullable',
        //     'genre_id' => 'required',
        //     'rating_umur_id' => 'required',
        //     'status_id' => 'required',
        //     'image' => 'image|file|max:1024',
        //     'body' => 'required',
        // ]);

        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('movie-images');
        // }
        // $validatedData['user_id'] = auth()->user()->id;

        // $validatedData['excerpt'] = Str::limit($request->body, 100);

        // Movie::create($validatedData);

        // return redirect('/dashboard/movies')->with('success', 'New movie had been added');
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
     * Remove the specified resource from
     *  storage.
     */
    public function destroy(Bookmark $bookmark)
    {

        Bookmark::destroy($bookmark->id);

        return redirect('/dashboard/bookmarks')->with('success', 'Bookmark had been ramoved');

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