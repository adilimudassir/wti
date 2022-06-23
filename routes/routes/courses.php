<?php

use App\Http\Controllers\CourseController;

Route::get('courses/{slug}', [CourseController::class, 'index'])->name('courses');
Route::get('courses/{slug}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::patch('courses/{slug}/update', [CourseController::class, 'update'])->name('courses.update');
