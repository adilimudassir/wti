<?php

// Dashboard > Courses > Overview

use Domains\Course\Models\Course;

Breadcrumbs::for('courses', function ($trail, $slug) {
    $trail->parent('dashboard');
    $trail->push(Course::whereSlug($slug ?? request()->course)->first()->title, route('courses', $slug ?? request()->course));
});


// Dashboard > Courses > Edit
Breadcrumbs::for('courses.edit', function ($trail, $slug) {
    $trail->parent('courses', $slug);
    $trail->push(Course::whereSlug($slug ?? request()->course)->first()->title, route('courses.edit', $slug ?? request()->course));
});
