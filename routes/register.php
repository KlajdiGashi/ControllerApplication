<?php
use App\Http\Controllers\RegisterAndLoginController;
use Illuminate\Support\Facades\Route;


Route::post('/register',[RegisterAndLoginController::class,'register']);
