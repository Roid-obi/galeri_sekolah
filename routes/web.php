<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/dashboard/home', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard/users', [UsersController::class, 'index'])->name('users');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');

// post
Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::post('/', [PostController::class, 'store'])->name('post.store');
    Route::put('/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});