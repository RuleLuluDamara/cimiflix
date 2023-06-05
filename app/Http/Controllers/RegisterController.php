<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',

        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        //$request->session()->flash('success', 'sign up success, please sign in');
        return redirect('/login')->with('success', 'sign up success, please sign in');
    }
}