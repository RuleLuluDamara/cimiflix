<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardMovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MovieController::class, 'home']);
Route::get('/about', [MovieController::class, 'about']);
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{movie:slug}', [MovieController::class, 'show']);
Route::get('/genres', [MovieController::class, 'showGenres']);
Route::get('/genres/{genre:slug}', [MovieController::class, 'showPerGenres']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardMovieController::class, 'dashboardIndex'])->middleware(('auth'));
Route::resource('/dashboard/movies', DashboardMovieController::class)->middleware(('auth'));
Route::get('/dashboard/movies/checkSlug', [DashboardMovieController::class, 'checkSlug'])->middleware(('auth'));
Route::resource('/dashboard/genres', AdminCategoryController::class)->except('show')->middleware(('admin'));