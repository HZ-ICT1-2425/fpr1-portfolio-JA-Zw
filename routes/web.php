<?php

use App\Http\Controllers\StaticController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticController::class, "home"])->name("home");

Route::get('/profile', [StaticController::class, "profile"])->name("profile");
Route::get('/faq', [StaticController::class, "faq"])->name("faq");
Route::get('/dashboard', [StaticController::class, "dashboard"])->name("dashboard");

Route::get('/posts', [PostController::class, "index"])->name("posts");
Route::get('/posts/{slug}', [PostController::class, "view"])->name("post");
