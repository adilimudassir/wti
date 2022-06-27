<?php

use App\Http\Controllers\BatchController;

Route::group(['prefix' => 'batches', 'as' => 'batches.'], function () {
    Route::get('', [BatchController::class, 'index'])->name('index');
    Route::get('/show/{id}', [BatchController::class, 'show'])->name('show');
    Route::get('/send-admission-letter/{id}', [BatchController::class, 'sendAdmissionLetter'])->name('send-admission-letter');
    Route::patch('/update/{id}', [BatchController::class, 'update'])->name('update');
});
