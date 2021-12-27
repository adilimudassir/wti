<?php

use App\Http\Controllers\UserCoursesController;

Route::group(['prefix' => 'user-courses', 'as' => 'user-courses.'], function () {
    Route::get('', [UserCoursesController::class, 'index'])->name('index');
    Route::get('/{course}', [UserCoursesController::class, 'show'])->name('show');
});
