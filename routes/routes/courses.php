<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseCostController;
use App\Http\Controllers\CourseLevelsController;
use App\Http\Controllers\CourseTopicsController;
use App\Http\Controllers\CourseBatchesController;
use App\Http\Controllers\CourseStudentsController;

Route::get('courses/{slug}/overview', [CourseController::class, 'index'])->name('courses.overview');
Route::get('courses/{slug}/topics', CourseTopicsController::class)->name('courses.topics');
Route::get('courses/{slug}/batches', CourseBatchesController::class)->name('courses.batches');
Route::get('courses/{slug}/levels', CourseLevelsController::class)->name('courses.levels');
Route::get('courses/{slug}/students', CourseStudentsController::class)->name('courses.students');
Route::get('courses/{slug}/costs', CourseCostController::class)->name('courses.cost');


Route::get('courses/{slug}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::patch('courses/{slug}/update', [CourseController::class, 'update'])->name('courses.update');
