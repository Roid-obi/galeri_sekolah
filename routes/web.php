<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\welcome;
use App\Http\Middleware\roleCek;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::controller(welcome::class)->group(function () {
    Route::get('/','index')->name('welcome.index');
    Route::get('/posts/{slug}','show')->name('post.detail');

    // Route::post('/', 'StoreComment')->name("comment"); 
    // Route::delete('/comments/{id}', 'destroy')->name('comments.destroy'); //hapus comment
    // Route::put('/comments/{comment}', 'update')->name('comments.update'); // edit comment

    Route::get('/post/category/{category}','showCategory')->name('post.category'); //menampilkan kategory yang di klik 
    Route::get('/post/tag/{tag}','showTag')->name('post.tag');  //menampilkan tag yang di klik 
});




Route::controller(welcome::class)->group(function () {
    Route::get('/','index')->name('welcome.index');
    Route::get('/posts/{slug}','show')->name('post.detail');
});

Auth::routes();

Route::get('/dashboard/home', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard/users', [UsersController::class, 'index'])->name('users');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');

// post
Route::prefix('post')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::post('/', [PostController::class, 'store'])->name('post.store');
    Route::put('/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

// tags
Route::prefix('tags')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tag.index');
    Route::post('/', [TagController::class, 'store'])->name('tag.store');
    Route::put('/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
});

// categories
Route::prefix('categories')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});