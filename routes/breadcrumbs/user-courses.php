<?php

use Domains\Course\Models\Course;

// Dashboard > My Courses
Breadcrumbs::for('user-courses.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('My Courses', route('user-courses.index'));
});

// Dashboard > My Courses > Show
Breadcrumbs::for('user-courses.show', function ($trail, $course) {
    $trail->parent('user-courses.index');
    $trail->push(Course::whereSlug($course)->first()->title, route('user-courses.show', [ $course ]));
});
