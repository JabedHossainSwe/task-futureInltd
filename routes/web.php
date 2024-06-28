<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('images', ImageController::class);
Route::get('/images/create', [ImageController::class, 'create'])->name('images.create');
Route::post('/images', [ImageController::class, 'store'])->name('images.store');

Route::resource('categories', CategoryController::class);
