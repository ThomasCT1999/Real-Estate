<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\HouseScrapingController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/scrape-houses', [HouseScrapingController::class, 'scrapeHouses'])->name('scrape.houses');
