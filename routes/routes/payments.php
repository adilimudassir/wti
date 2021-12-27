<?php

use App\Http\Controllers\PaymentController;

Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
    Route::get('', [PaymentController::class, 'index'])->name('index');
    Route::get('/create', [PaymentController::class, 'create'])->name('create');
    Route::post('/store', [PaymentController::class, 'store'])->name('store');
    Route::get('/show/{id}', [PaymentController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [PaymentController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [PaymentController::class, 'destroy'])->name('delete');
});
