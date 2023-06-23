<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Likes;
use App\Models\RatingUmur;
use App\Models\User_rating;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\comment;

class MovieController extends Controller
{
    public function home()
    {
        return view('home', [
            'title' => 'Home',
            'active' => 'Home',
            "movies" => Movie::orderBy('rilis', 'desc')->take(10)->get(),

        ]);
    }
    public function about()
    {
        return view('about', [
            'title' => 'About',
            'active' => 'about',
        ]);
    }
    public function index()
    {

        return view('movies', [
            "title" => "Movie List",
            "active" => 'movies',
            "movies" => Movie::all(),
            //"posts" => Post::all(),
            //"movies" => Movie::latest()->filter(request(['find', 'category']))->get()
        ]);
    }

    public function show($slug)
    {
        //dd(Movie::find($slug)->ratingumur->rate);

        return view('movie', [
            "title" => "Movie",
            "movie" => Movie::find($slug),
            "comments" => comment::all(),
            "ratingumur" => RatingUmur::all(),
            "userrating" => Movie::find($slug)->userrating->first()->rating
        ]);
    }

    public function showGenres()
    {
        return view('genres', [
            'title' => 'Movie Genres',
            'active' => 'genres',
            'genres' => Genre::all()
        ]);
    }

    public function showPerGenres(Genre $genre)
    {
        return view('movies', [
            'title' => "Movie by genre : $genre->name",
            "active" => 'movies',
            'genres' => $genre->name,
            'movies' => $genre->movies
        ]);
    }
    public function store(Request $request)
    {
        //return ($request);
        //dd($request);
        //dd($request->movie_id);
        //dd($request->route('id'));
        //route = $request->route();
        //dd();

        $validatedData = $request->validate([
            'message' => 'required|max:255',
        ]);


        $validatedData['waktu_comment'] = date('Y-m-d H:i:s');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['movie_id'] = $request->route('id');
        comment::create($validatedData);

        return back()->with('success', 'New comment has been added.');
    }

    public function storeRating(Request $request)
    {
        //return ($request);
        //dd($request->rate);
        //dd($request->movie_id);
        //dd($request->route('id'));
        //route = $request->route();
        //dd();

        $validatedData = $request->validate([
            'rating' => 'required|max:255',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['movie_id'] = $request->route('id');
        User_rating::create($validatedData);

        return back()->with('success', 'New rate has been added.');
    }

    public function storeBookmark(Request $request, $id)
    {
        //return ($request);

        $movie = $request->route('id');
        $bookmark = Bookmark::where('movie_id', $movie)->first();

        //dd($movie->bookmark->bookmark_status);
        //dd($bookmark->bookmark_status);
        //route = $request->route();
        //dd();

        $validatedData['bookmark_status'] = $request->input('bookmark');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['movie_id'] = $request->route('id');
        Bookmark::create($validatedData);

        return back()->with('success', 'New rate has been added.');
    }

    public function storeLike(Request $request, $id)
    {
        //dd($request->input('like'));
        // Simpan film ke dalam daftar favorit pengguna

        $validatedData['like_status'] = $request->input('like');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['movie_id'] = $request->route('id');
        Likes::create($validatedData);

        return redirect()->back();
    }


}