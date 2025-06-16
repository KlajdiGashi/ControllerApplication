<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController; // ✅ Moved this up
use Illuminate\Validation\Rule;

// ✅ Home (login) page
Route::get('/', function () {
    return view('loginUser');
});

// ✅ Home page after login
Route::get('/home', function () {
    return view('Home'); // matches Home.blade.php
});

// ✅ Registration form
Route::get('/register', function () {
    return view('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/createBlog', function () {
        return view('createBlog');
    });

    Route::post('/blog/store', [BlogController::class, 'storeBlog'])->name('blog.store');
});


// ✅ User registration and login actions
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
