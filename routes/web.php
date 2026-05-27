<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->middleware('guest');


Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');


Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

    
Route::get('/', [BlogController::class, 'index']);
Route::get('/search-blogs', [BlogController::class, 'search']);


Route::middleware('auth')->group(function () {

    Route::get('/blogs/create', [BlogController::class, 'create']);
    Route::post('/blogs/preview', [BlogController::class, 'preview']);
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit']);
    Route::put('/blogs/{blog}', [BlogController::class, 'update']);
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy']);
});

Route::get('/blogs/{blog}', [BlogController::class, 'show']);