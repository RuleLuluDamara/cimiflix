<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Movie;

use Illuminate\Http\Request;

class DashboardLikesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.likes.index', [
            'likes' => Likes::where('user_id', auth()->user()->id)->get(),
            //'bookmarks' => Bookmark::all(),
            'movies' => Movie::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Likes $likes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Likes $likes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Likes $like)
    {

        Likes::destroy($like->id);

        return redirect('/dashboard/likes')->with('success', 'Like had been ramoved');

    }
}