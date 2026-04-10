<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/search', [AdminController::class, 'search']);
Route::get('/export', [AdminController::class, 'export']);
Route::get('/admin/contact/{id}', [AdminController::class, 'show']);
Route::get('/reset', [AdminController::class, 'reset']);
Route::delete('/admin/contact/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/delete', [AdminController::class, 'delete']);
