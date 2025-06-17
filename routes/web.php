<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [BlogController::class, 'index'])->name('home');


Route::get('/login-page', function () {
    return view('loginpage');
});

Route::get('/register-page', function () {
    return view('registerpage');
});

Route::get('/blog-create', function () {
    return view('blogpage');
});

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/create', [BlogController::class, 'store']);
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

Route::get('/edit/{blog}', [BlogController::class, 'edit']);
Route::put('/update/{blog}', [BlogController::class, 'update']);



