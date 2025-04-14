<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('bugs', \App\Http\Controllers\BugController::class);

Route::resource('projects', \App\Http\Controllers\ProjectController::class);

Route::resource('comments', \App\Http\Controllers\CommentController::class);

Route::resource('attachments', \App\Http\Controllers\AttachmentController::class);

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
