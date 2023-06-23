<?php

namespace App\Http\Controllers;

use App\Models\RatingUmur;
use Illuminate\Http\Request;

class AdminRatingUmurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.rating_umur.index', [
            'rating_umurs' => RatingUmur::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rating_umur.create', [
            'rating_umurs' => RatingUmur::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'rate' => 'required|max:255',
        ]);
        RatingUmur::create($validatedData);

        return redirect('/dashboard/rating_umur')->with('success', 'New Method had been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(RatingUmur $rating_umur)
    {
        return view('dashboard.rating_umur.show', [
            'rating_umur' => $rating_umur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RatingUmur $rating_umur)
    {
        $rating_umur = RatingUmur::where('id', $rating_umur->id)->first();

        if (!$rating_umur) {
            abort(404); // Handle the case where the method is not found
        }
        return view('dashboard.rating_umur.edit', [
            'rating_umur' => $rating_umur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RatingUmur $rating_umur)
    {
        $rules = [
            'rate' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        RatingUmur::where('id', $rating_umur->id)
            ->update($validatedData);

        return redirect('/dashboard/rating_umur')->with('success', 'rating_umur has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RatingUmur $rating_umur)
    {
        $rating_umur->delete();

        return redirect('/dashboard/rating_umur')->with('success', 'rating_umur had been deleted');
    }
}