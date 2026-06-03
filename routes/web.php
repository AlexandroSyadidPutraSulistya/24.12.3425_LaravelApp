<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PartnerController;

// Route User Area

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// Route Admin Area

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::resource('categories', CategoryController::class);
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
Route::get('/partners/create', [PartnerController::class, 'create']);
Route::post('/partners/store', [PartnerController::class, 'store']);
Route::delete('/partners/{id}', [PartnerController::class, 'destroy'])->name('partners.destroy');
Route::get('/partners/{id}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
Route::put('/partners/{id}', [PartnerController::class, 'update'])->name('partners.update');
Route::resource('events', EventAdminController::class);
});

// Route::prefix('admin')->name('admin.')->group(function () {


// });
