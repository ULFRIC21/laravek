<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoaderController;
use App\Http\Controllers\AdminController;

Route::get('/special', [PageController::class, 'special'])->name('special');
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/calc', [PageController::class, 'calc'])->name('calc');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}/execute', [OrderController::class, 'execute'])->name('orders.execute')->where('id', '[0-9]+');
    Route::post('/orders/{id}/assign', [OrderController::class, 'assign'])->name('orders.assign')->where('id', '[0-9]+');
    Route::get('/orders/{id}/complete', [OrderController::class, 'completeForm'])->name('orders.complete')->where('id', '[0-9]+');
    Route::post('/orders/{id}/complete', [OrderController::class, 'complete'])->name('orders.complete.store')->where('id', '[0-9]+');
    Route::get('/driver', [DriverController::class, 'index'])->name('driver')->middleware('role:driver,admin');
    Route::get('/loader', [LoaderController::class, 'index'])->name('loader')->middleware('role:loader,admin');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('role:admin');
});
