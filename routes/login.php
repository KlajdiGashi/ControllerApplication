<?php

use App\Http\Controllers\RegisterAndLoginController;
use Illuminate\Support\Facades\Route;


Route::post('/login',[RegisterAndLoginController::class,'login']);

Route::get('/login',function(){
    return view('login');
})->name('login');