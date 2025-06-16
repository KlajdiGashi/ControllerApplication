<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('home');



Route::get('/login-page', function () {
    return view('loginpage');
});

Route::get('/register-page', function () {
    return view('registerpage');
});

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);


