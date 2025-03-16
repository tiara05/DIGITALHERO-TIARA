<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

Route::get('/', [BookingController::class, 'index']);
Route::get('/get-available-times', [BookingController::class, 'getAvailableTimes']);
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/update-status/{orderId}/{status}', [BookingController::class, 'updateStatus']);
Route::get('/download-pdf/{orderId}', [BookingController::class, 'downloadPDF']);

Route::get('/pay/{bookingId}', [PaymentController::class, 'pay'])->name('pay')->where('bookingId', '[A-Za-z0-9]+');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');

Route::get('/admin', [AdminController::class, 'showLogin'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.index');
    Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
    
    Route::get('/admin/orders/{id}', [AdminController::class, 'showOrder'])->name('admin.order.show');
    Route::post('/admin/orders/{id}', [AdminController::class, 'updateOrder'])->name('admin.order.update');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->middleware('auth:admin')->name('admin.logout');

