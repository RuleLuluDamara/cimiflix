<?php

namespace App\Models;

use App\Http\Controllers\CastMovie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function castmovie()
    {
        return $this->hasMany(CastMovie::class);
    }

}