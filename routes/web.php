<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [PortfolioController::class, 'sendMessage'])->name('portfolio.send');

// Route Profil & CV
Route::post('/update-photo', [PortfolioController::class, 'updatePhoto'])->name('profile.update-photo');
Route::get('/download-cv', [PortfolioController::class, 'downloadCv'])->name('profile.download-cv');
Route::post('/update-cv', [PortfolioController::class, 'updateCv'])->name('profile.update-cv');