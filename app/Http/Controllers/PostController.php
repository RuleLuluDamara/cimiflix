<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;


class PostController extends Controller
{
    public function home()
    {
        return view('home', [
            'title' => 'Home',
            'active' => 'Home'
        ]);
    }
    public function about()
    {
        return view('about', [
            'title' => 'About',
            'active' => 'about',
        ]);
    }
    public function index()
    {

        return view('posts', [
            "title" => "Movie List",
            "active" => 'posts',
            //"posts" => Post::all(),
            "posts" => Post::latest()->filter(request(['find', 'category']))->get()
        ]);
    }

    public function show($slug)
    {
        return view('post', [
            "title" => "post",
            "post" => Post::find($slug)

        ]);
    }

    public function showCategories()
    {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
    }

    public function showPerCategories(Category $category)
    {
        return view('posts', [
            'title' => "Post by Category : $category->nama",
            'active' => 'categories',
            'posts' => $category->posts->load('author', 'category')
        ]);
    }
    public function author(User $author)
    {
        return view('posts', [
            'title' => "Post by Author : $author->name",
            'posts' => $author->posts->load('category', 'author')
        ]);
    }




}