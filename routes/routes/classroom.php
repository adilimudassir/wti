<?php

use App\Http\Controllers\ClassroomController;

Route::group(['prefix' => 'classroom', 'as' => 'classroom.', 'middleware' => 'impersonate.protect'], function () {
    Route::get('', [ClassroomController::class, 'index'])->name('index');
    Route::get('/{course}/{level}/{topic}', [ClassroomController::class, 'show'])->name('show');
});
