<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('loginUser');
});

Route::get('/home', function () {
    return view('Home'); // This matches your Home.blade.php
});

Route::get('/register', function () {
    return view('register'); // register form
});


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);