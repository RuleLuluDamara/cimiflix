<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\Subscription;
use App\Models\Payment_method;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;

class Payment2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payment2.create', [
            "title" => "Payment",
            'methods' => Payment_method::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment2.create', [
            "title" => "Payment",
            'methods' => Payment_method::all()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'total' => 'required',
            'payment_method_id' => 'required',
        ]);
        $validatedData['payment_date'] = Carbon::now()->format('Y-m-d'); // Menggunakan Carbon::now()
        $validatedData['subscription_id'] = Subscription::latest()->first()->id;
        $validatedData['status'] = 'true';
        //dd($validatedData);
        payment::create($validatedData);

        return redirect('/')->with('success', 'New Genres had been added');
    }


    /**
     * Display the specified resource.
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment $payment)
    {
        //
    }
}