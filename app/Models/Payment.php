<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function paymentmethod()
    {
        return $this->belongsTo(Payment_method::class);
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
    public function paymentstatus()
    {
        return $this->belongsTo(PaymentStatu::class);
    }
}
