<?php

use Domains\Course\Models\Course;

// Dashboard > Class Room
Breadcrumbs::for('classroom.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Class Room', route('classroom.index'));
});

// Dashboard > Class Room
Breadcrumbs::for('classroom.show', function ($trail, $course, $level, $topic) {
    $trail->parent('classroom.index');
    $trail->push(Course::whereSlug($course)->first()->title, route('classroom.show', [ $course, $level, $topic ]));
});
