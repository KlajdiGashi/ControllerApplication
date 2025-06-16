<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Validation\Rule;

//loginForm
Route::get('/', function () {
    return view('loginUser');
});

Route::get('/home', function () {
    return view('Home'); // matches  Home.blade.php
});

Route::get('/register', function () {
    return view('register'); // register form
});


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);