<?php

use App\Http\Controllers\StaticController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;

Route::get('/', [StaticController::class, "home"])->name("home");
Route::get('/profile', [StaticController::class, "profile"])->name("profile");
Route::get('/dashboard', [StaticController::class, "dashboard"])->name("dashboard");

Route::resources([
    'posts' => PostController::class
]);

Route::resource("faq", FAQController::class)->except(["show"]);
