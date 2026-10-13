<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;

// Menggantikan route manual books dengan Route::resource agar semua fungsi CRUD (create, store, edit, update, destroy) aktif otomatis
Route::resource('books', BookController::class);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/members', [MemberController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);