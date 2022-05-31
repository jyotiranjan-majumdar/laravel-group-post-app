<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikecontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutContoller;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function(){
    return view('home');
})->name('home');

//Route::view('/', view: 'home')->name(name:'home');

Route::get('/dashboard', [DashboardController::class, 'index'])
->name(name:'dashboard');

Route::post('/logout', [LogoutContoller::class, 'store'])->name(name:'logout');


Route::get('/login', [LoginController::class, 'index'])->name(name:'login');
Route::post('/login', [LoginController::class, 'store']);


Route::get('/register', [RegisterController::class, 'index'])->name(name:'register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name(name:'posts');
Route::post('/posts', [PostController::class, 'store']);

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); 

Route::post('/posts/{post}/likes', [PostLikecontroller::class, 'store'])->name(name:'posts.likes');

//Route::delete('/posts/{post}/likes', [PostLikecontroller::class, 'destroy'])->name(name:'posts.likes');

// Route::get('/', function(){
//     return view('posts.index');
// });
