<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieStatuses extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function moviestatuses()
    {
        return $this->belongsTo(MovieStatuses::class);
    }
}