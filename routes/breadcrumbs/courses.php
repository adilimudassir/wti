<?php

// Dashboard > Courses > Overview

use Domains\Course\Models\Course;

Breadcrumbs::for('courses', function ($trail, $slug) {
    $trail->parent('dashboard');
    $trail->push(Course::whereSlug($slug)->first()->title, route('courses', $slug));
});
