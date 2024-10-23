<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

/**
 * Route::get()    |  Consultar
 * Route::post()   |  Guardar
 * Route::delete() |  Eliminar
 * Route::put()    |  Actualizar
 */

/** Forma de hacerlo larga
 *
 * Route::get('/', [PageController::class, 'home'])->name('home');
 * Route::get('blog', [PageController::class, 'blog'])->name('blog');
 * Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');
 */

// forma corta, se hace un grupo

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('blog/{post:slug}', 'post')->name('post');
});

Route::resource('posts', PostController::class)
    ->except('show')
    ->middleware(['auth', 'verified']);

Route::redirect('/dashboard', 'posts')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
