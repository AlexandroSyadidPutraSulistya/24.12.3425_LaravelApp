<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\TransactionController;

// Route User Area

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// Route Admin Area

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); 
});

Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('events', EventAdminController::class);
});