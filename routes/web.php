<?php

use App\Models\User;
use App\Models\Genre;
use App\Models\comment;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Payment2Controller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCastController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminGenreController;
use App\Http\Controllers\AdminMovieController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardLikesController;
use App\Http\Controllers\DashboardMovieController;
use App\Http\Controllers\AdminRatingUmurController;
use App\Http\Controllers\DashboardBookmarkController;
use App\Http\Controllers\AdminPaymentMethodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them Pwill
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
Route::resource('/dashboard/user', DashboardUserController::class);

Route::resource('/subscription', SubscriptionController::class);
Route::resource('/payment', PaymentController::class);
Route::resource('/payment2', Payment2Controller::class);


Route::get('/dashboard', [DashboardMovieController::class, 'dashboardIndex']);
Route::resource('/dashboard/movies', AdminMovieController::class);
Route::resource('/dashboard/bookmarks', DashboardBookmarkController::class);
Route::resource('/dashboard/genres', AdminGenreController::class);
Route::resource('/dashboard/casts', AdminCastController::class);
Route::resource('/dashboard/likes', DashboardLikesController::class);

Route::resource('/dashboard/payment_method', AdminPaymentMethodController::class);
Route::resource('/dashboard/rating_umur', AdminRatingUmurController::class);


Route::resource('/dashboard/users', AdminUserController::class);
Route::resource('/dashboard/user', DashboardUserController::class);


Route::post('/movies/{id}/comment', [MovieController::class, 'store']);
Route::post('/movies/{id}/rating', [MovieController::class, 'storeRating']);
Route::post('/movies/{id}/bookmark', [MovieController::class, 'storeBookmark']);
Route::post('/movies/{id}/like', [MovieController::class, 'storeLike']);