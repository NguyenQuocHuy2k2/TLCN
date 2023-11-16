<?php

use App\Http\Controllers\PagesController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::any('/', [PagesController::class, 'index'])->name('home');
Route::any('/admin', [PagesController::class, 'count'])->name('home_admin');