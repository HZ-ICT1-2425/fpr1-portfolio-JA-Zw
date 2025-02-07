<?php

use App\Http\Controllers\StaticController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticController::class, "home"])->name("home");

Route::get('/profile', [StaticController::class, "profile"]);
Route::get('/faq', [StaticController::class, "faq"]);
Route::get('/dashboard', [StaticController::class, "dashboard"]);

Route::get('/posts', [PostController::class, "index"]);
Route::get('/posts/{slug}', [PostController::class, "view"]);

