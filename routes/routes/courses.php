<?php

use App\Http\Controllers\TopicController;
use App\Http\Controllers\CourseController;

Route::get('courses/{slug}', CourseController::class)->name('courses');