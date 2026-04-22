<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventsController;

// Route User Area

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// Route Admin Area

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/events', [EventsController::class, 'indexAdmin'])->name('events.index');
Route::get('/transactions', [EventsController::class, 'transactionAdmin'])->name('transaction.index');
});