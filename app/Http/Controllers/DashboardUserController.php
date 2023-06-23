<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dashboard.user.index', [
        //     'user' => auth()->check() ? User::where('user_id', auth()->user()->id)->get() : null
        // ]);
        $user = auth()->user();
        return view('dashboard.user.index', compact('user'));
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = auth()->user();
        // return view('dashboard.users.edit', [
        //     'users' => User::all(),
        //     'user' => $user
        // ]);
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'name' => 'required|max:255',
            'username' => 'required',
            'email' => 'required|email',
            'password' => '',
        ];
        $validatedData = $request->validate($rules);

        unset($validatedData['password']);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        User::where('id', $user->id)
            ->update($validatedData);
        return redirect('/dashboard/user')->with('success', 'Account information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}