<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
// Route::get('/uslugi', [PageController::class, 'uslugi'])->name('uslugi');
Route::get('/special', [PageController::class, 'special'])->name('special');
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{id}', [PageController::class, 'showNews'])->name('news.show')->where('id', '[0-9]+');
Route::get('/calc', [PageController::class, 'calc'])->name('calc');





Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
