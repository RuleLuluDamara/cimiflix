<?php

namespace App\Models;

use App\Models\Genre;
use App\Http\Controllers\CastMovie;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Movie extends Model
{
    use HasFactory, Sluggable;

    //protected $fillable = ['name', 'genre_id', 'excerpt', 'body'];
    protected $guarded = ['id'];
    //protected $with = ['category', 'author'];

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['find'] ?? false, function ($query, $find) {
    //         return $query->where('title', 'like', '%' . $find . '%')
    //             ->orWhere('body', 'like', '%' . $find . '%');

    //     });
    //     $query->when($filters['category'] ?? false, function ($query, $category) {
    //         return $query->whereHas('category', function ($query) use ($category) {
    //             $query->where('slug', $category);
    //         });
    //     });
    // }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function moviestatuses()
    {
        return $this->belongsTo(MovieStatus::class);
    }
    public function ratingumur()
    {
        return $this->belongsTo(RatingUmur::class);
    }
    public function userrating()
    {
        return $this->hasMany(User_rating::class);
    }
    public function bookmark()
    {
        return $this->hasMany(Bookmark::class);
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function comment()
    {
        return $this->hasMany(comment::class);
    }
    public function castmovie()
    {
        return $this->hasMany(CastMovie::class);
    }


    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }


}