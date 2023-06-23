<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Genre extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}