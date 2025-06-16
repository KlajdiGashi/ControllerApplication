<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAccess;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class,'index'])->name("post.index");
Route::post('post/', [PostController::class, 'store'])->name("post.store")->middleware("auth");
Route::get('post/create', [PostController::class, 'create'])->name("post.create")->middleware("auth");
Route::put('post/{post}', [PostController::class, 'update'])->name("post.update")->middleware(["auth", CheckAccess::class]);
Route::get('post/{post}', [PostController::class, 'show'])->name("post.show");
Route::delete('post/{post}', [PostController::class, 'destroy'])->name("post.destroy")->middleware(["auth",CheckAccess::class]);
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name("post.edit")->middleware(["auth",CheckAccess::class]);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
