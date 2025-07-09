<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::delete('/logout', [UserController::class, 'logout']);
Route::get('/profile/{user}', [UserController::class, 'profile']);

Route::get('/home', [MainController::class, 'home']);

Route::post('/create-book', [BookController::class, 'createBook']);
Route::get('/assign-book/{book}', [BookController::class, 'assignBookPage']);
Route::post('/assign-book/{book}/{user}', [BookController::class, 'assignBook']);