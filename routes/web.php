<?php

use App\Http\Controllers\StaticController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;

Route::get('/', [StaticController::class, "home"])->name("home");

Route::get('/profile', [StaticController::class, "profile"])->name("profile");
Route::get('/dashboard', [StaticController::class, "dashboard"])->name("dashboard");

Route::get('/posts', [PostController::class, "index"])->name("posts");
Route::get('/posts/create', [PostController::class, "create"])->name("posts.create");
Route::post('/posts', [PostController::class, "submit"])->name("posts.submit");
Route::get('/posts/edit/{slug}', [PostController::class, "edit"])->name("posts.edit");
Route::put("/posts/{post}", [PostController::class, "update"])->name("posts.update");
Route::delete("/posts/{id}", [PostController::class, "delete"])->name("posts.delete");
Route::get('/posts/{slug}', [PostController::class, "view"])->name("post");


Route::get('/faq', [FAQController::class, "index"])->name("faq");
Route::get('/faq/create', [FAQController::class, "create"])->name("faq.create");
Route::post('/faq', [FAQController::class, "submit"])->name("faq.submit");
Route::get('/faq/edit/{faq}', [FAQController::class, "edit"])->name("faq.edit");
Route::put("/faq/{faq}", [FAQController::class, "update"])->name("faq.update");
Route::delete("/faq/{id}", [FAQController::class, "delete"])->name("faq.delete");
