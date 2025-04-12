<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/instituto', [SiteController::class, 'instituicao'])->name('site.instituto');
