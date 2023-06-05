<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}