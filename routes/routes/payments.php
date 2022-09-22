<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FlutterwavePaymentController;

Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
    Route::get('', [PaymentController::class, 'index'])->name('index');
    Route::get('/create', [PaymentController::class, 'create'])->name('create');
    Route::post('/store', [PaymentController::class, 'store'])->name('store');
    Route::get('/show/{id}', [PaymentController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [PaymentController::class, 'update'])->name('update');
    Route::get('/verify/{id}', [PaymentController::class, 'verify'])->name('verify');
    Route::delete('/destroy/{id}', [PaymentController::class, 'destroy'])->name('delete');

    Route::group(['prefix' => 'flutterwave', 'as' => 'flutterwave.'], function () {
        Route::post('/pay', [FlutterwavePaymentController::class, 'pay'])->name('pay');
        Route::get('/callback', [FlutterwavePaymentController::class, 'callback'])->name('callback');
    });
});
