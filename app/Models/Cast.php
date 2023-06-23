<?php

namespace App\Models;

use App\Models\Cast_movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cast extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cast_movie()
    {
        return $this->hasMany(Cast_movie::class);
    }

}