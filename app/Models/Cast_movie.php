<?php

namespace App\Models;

use App\Http\Controllers\Movie;
use App\Http\Controllers\Cast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast_movie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function cast()
    {
        return $this->belongsTo(Cast::class);
    }

}