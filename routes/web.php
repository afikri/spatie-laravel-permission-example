<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users', App\Http\Controllers\UserController::class);
Route::resource('/roles', App\Http\Controllers\RoleController::class);
