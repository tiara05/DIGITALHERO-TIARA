<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

Route::get('/', [BookingController::class, 'index']);
Route::get('/get-available-times', [BookingController::class, 'getAvailableTimes']);
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/update-status/{orderId}/{status}', [BookingController::class, 'updateStatus']);
Route::get('/download-pdf/{orderId}', [BookingController::class, 'downloadPDF']);

Route::get('/pay/{bookingId}', [PaymentController::class, 'pay'])->name('pay')->where('bookingId', '[A-Za-z0-9]+');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');

