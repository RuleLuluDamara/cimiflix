<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\Payment_method;
use App\Models\Subscription;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payment.subscription', [
            "title" => "Subscription",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment.create', [
            "title" => "Payment",
            'methods' => Payment_method::all()
        ]);
    }

    public function storePayment(Request $request)
    {
        dd($request);
        $validatedData = $request->validate([
            'total' => 'required',
            'payment_method_id' => 'required',
        ]);
        $validatedData['payment_date'] = now();
        $validatedData['subscription_id'] = Subscription::latest()->first()->id;
        $validatedData['status'] = 'true';

        payment::create($validatedData);

        return redirect('/dashboard')->with('success', 'New Genres had been added');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'true';

        $subscription = Subscription::create($validatedData);

        return redirect('/payment2')->with('success', 'New Transaction had been added');
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