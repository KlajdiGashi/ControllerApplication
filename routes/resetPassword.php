<?php

use App\Http\Controllers\RegisterAndLoginController;
use Illuminate\Support\Facades\Route;

Route::post('/resetPassword',[RegisterAndLoginController::class,'resetPassword']);