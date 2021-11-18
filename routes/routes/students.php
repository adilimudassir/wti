<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPasswordController;

Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
    Route::get('', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [StudentController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])->name('delete');
    Route::get('/change-password/{id}', [StudentPasswordController::class, 'edit'])->name('change-password');
    Route::post('/change-password/{id}', [StudentPasswordController::class, 'update']);
});
