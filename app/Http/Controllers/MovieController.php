<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function home()
    {
        return view('home', [
            'title' => 'Home',
            'active' => 'Home'
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
        return view('movie', [
            "title" => "Movie",
            "movie" => Movie::find($slug)

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
}