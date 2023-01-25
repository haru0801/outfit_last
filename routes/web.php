<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\UserController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/posts/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/timeline', [PostController::class, 'timeline'])->name('post.timeline');
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/posts/review', [PostController::class, 'review_create'])->name('review.create');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::post('/posts/review', [PostController::class, 'review_store'])->name('review.store');
    Route::get('/posts/{post}', [PostController::class ,'show'])->name('post.show');
    Route::delete('/posts/{post}', [PostController::class,'delete'])->name('post.delete');
});
Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
});

Route::post('users/{user}/follow', [UserController::class, 'follow'])->name('follow');
Route::delete('users/{user}/unfollow',[UserController::class, 'unfollow'])->name('unfollow');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
