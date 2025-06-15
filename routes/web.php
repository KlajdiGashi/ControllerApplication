<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
})->name('register');

Route::get('/home',function(){
    return view('home');
})->name('home');

Route::post('/logout',function(){
    return view('login');
})->name('login');

Route::get('/resetPassword',function(){
    return view ('resetPassword');
})->name('resetPassword');

require __DIR__.'/resetPassword.php';
require __DIR__ .'/register.php';
require __DIR__ .'/login.php';
