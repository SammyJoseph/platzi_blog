<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/* Mis rutas */
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');

    // Route::get('blog', 'blog')->name('blog'); // se realizará desde el home

    Route::get('blog/{post:slug}', 'post')->name('post');
});

Route::resource('posts', PostController::class)->middleware(['auth', 'verified'])->except(['show']); // except(['show']) es para que no se genere la ruta posts.show 

/* Rutas de autenticación Breeze */
Route::redirect('/dashboard', 'posts')->name('dashboard');

Route::middleware('auth')->group(function () { // estas rutas requieren autenticación
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; // estas rutas se han generado en routes/auth.php
