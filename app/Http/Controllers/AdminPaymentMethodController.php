<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_method;

class AdminPaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.payment_method.index', [
            'payment_methods' => payment_method::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.payment_method.create', [
            'payment_methods' => payment_method::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'method' => 'required|max:255',
        ]);
        payment_method::create($validatedData);

        return redirect('/dashboard/payment_method')->with('success', 'New Method had been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(payment_method $payment_method)
    {
        return view('dashboard.payment_method.show', [
            'payment_method' => $payment_method
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment_method $payment_method)
    {
        $payment_method = payment_method::where('id', $payment_method->id)->first();

        if (!$payment_method) {
            abort(404); // Handle the case where the method is not found
        }
        return view('dashboard.payment_method.edit', [
            'payment_method' => $payment_method,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment_method $payment_method)
    {
        $rules = [
            'method' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        payment_method::where('id', $payment_method->id)
            ->update($validatedData);

        return redirect('/dashboard/payment_method')->with('success', 'payment_method has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment_method $payment_method)
    {
        $payment_method->delete();

        return redirect('/dashboard/payment_method')->with('success', 'payment_method had been deleted');
    }

}