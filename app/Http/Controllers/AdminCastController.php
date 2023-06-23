<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class AdminCastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.casts.index', [
            'casts' => Cast::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.casts.create', [
            'casts' => Cast::all(),
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

        Cast::create($validatedData);

        return redirect('/dashboard/casts')->with('success', 'New Casts had been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cast $cast)
    {
        return view('dashboard.casts.show', [
            'cast' => $cast
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cast $cast)
    {
        return view('dashboard.casts.edit', [
            'cast' => $cast,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cast $cast)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        Cast::where('id', $cast->id)
            ->update($validatedData);

        return redirect('/dashboard/casts')->with('success', 'Cast has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        $cast->delete();

        return redirect('/dashboard/casts')->with('success', 'Cast had been deleted');
    }
}