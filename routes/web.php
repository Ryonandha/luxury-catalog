<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/product/{product:slug}', [FrontController::class, 'show'])->name('product.show');