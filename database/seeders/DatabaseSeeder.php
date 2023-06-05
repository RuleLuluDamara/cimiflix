<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cast;
use App\Models\Post;
use App\Models\User;
use App\Models\Genre;
use App\Models\Likes;
use App\Models\Movie;
use App\Models\comment;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\RatingUmur;
use App\Models\User_rating;
use App\Models\Subscription;
use App\Models\MovieStatuses;
use App\Models\Payment_method;
use Illuminate\Database\Seeder;
use App\Http\Controllers\SubscriptionStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'person 1',
            'username' => 'person11',
            'email' => 'a@example.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(2)->create();

        Category::create([
            'nama' => 'Machine Learning',
            'slug' => 'Machine-learning'
        ]);

        Category::create([
            'nama' => 'Programming',
            'slug' => 'programing'
        ]);

        Category::create([
            'nama' => 'Personal',
            'slug' => 'personal'
        ]);

        Genre::create([
            'name' => 'Action',
            'slug' => 'action'
        ]);

        Genre::create([
            'name' => 'Drama',
            'slug' => 'drama'
        ]);

        Genre::create([
            'name' => 'Comedy',
            'slug' => 'comedy'
        ]);

        Genre::create([
            'name' => 'Thriller',
            'slug' => 'thriller'
        ]);

        Genre::create([
            'name' => 'Romance',
            'slug' => 'romance'
        ]);

        Genre::create([
            'name' => 'Adventure',
            'slug' => 'adventure'
        ]);

        Genre::create([
            'name' => 'Sci-Fi',
            'slug' => 'sci-fi'
        ]);

        Genre::create([
            'name' => 'Horror',
            'slug' => 'horror'
        ]);

        Genre::create([
            'name' => 'Animation',
            'slug' => 'animation'
        ]);

        Post::factory(10)->create();
        Movie::factory(15)->create();
        User_rating::factory(15)->create();
        Bookmark::factory(15)->create();
        Likes::factory(15)->create();
        comment::factory(15)->create();
        Cast::factory(15)->create();

        Payment_method::create(
            [
                'method' => 'Kartu Kredit'
            ]
        );
        Payment_method::create(
            [
                'method' => 'Transfer Bank'
            ]
        );
        Payment_method::create(
            [
                'method' => 'E-Wallet'
            ]
        );

        MovieStatuses::create([
            'jenis' => 'paid'
        ]);
        MovieStatuses::create([
            'jenis' => 'free'
        ]);
        RatingUmur::create([
            'rate' => 'General'
        ]);
        RatingUmur::create([
            'rate' => '13+'
        ]);
        RatingUmur::create([
            'rate' => '17+'
        ]);
        RatingUmur::create([
            'rate' => '21+'
        ]);

        // Post::create([
        //     'title' => 'Judul keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam officia',
        //     'body' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam officia, id ab sapiente inventore blanditiis vel est voluptas numquam, voluptates natus aliquid nam officiis minus iure amet soluta laboriosam ipsum.</p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam officia, id ab sapiente inventore blanditiis vel est voluptas numquam, voluptates natus aliquid nam officiis minus iure amet soluta laboriosam ipsum.</p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam officia, id ab sapiente inventore blanditiis vel est voluptas numquam, voluptates natus aliquid nam officiis minus iure amet soluta laboriosam ipsum.</p>',
        //     'category_id' => 3,
        //     'user_id' => 2
        // ]);

    }
}