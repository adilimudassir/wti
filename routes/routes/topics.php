<?php

use App\Http\Controllers\TopicController;

Route::get('courses/{slug}/topics/create', [TopicController::class, 'create'])->name('topics.create');

Route::group(['prefix' => 'topics', 'as' => 'topics.'], function () {
    Route::post('/store', [TopicController::class, 'store'])->name('store');
    Route::get('/{slug}', [TopicController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [TopicController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [TopicController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [TopicController::class, 'destroy'])->name('delete');
});
