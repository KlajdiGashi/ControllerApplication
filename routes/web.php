<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use App\Models\blog;


Route::get('/register', fn() => view('register'))->name('register');
Route::get('/login', fn() => view('login'))->name('login');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/storeBlog', function () {
    $blogs = Blog::where('user_id', Auth::id())->get();
    return view('blog', compact('blogs'));
})->middleware('auth');
// Route::get('/storeBlog', function () {
//     return view('blog');
// });
Route::get('/', function () {
    return view('register', ['user' => Auth::user()]);
})->middleware('auth');

Route::get('/storeBlog', function () {
    $blogs = Blog::where('user_id', Auth::id())->get();
    return view('blog', compact('blogs'));
})->middleware('auth');
// Per Log Out
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
});

Route::post('/storeBlog', [BlogController::class, 'storeBlog']);

