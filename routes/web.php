<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/register', fn() => view('register'))->name('register');
Route::get('/login', fn() => view('login'))->name('login');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/', function () {
    return view('home', ['user' => Auth::user()]);
})->middleware('auth');

// Per Log Out
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
});
