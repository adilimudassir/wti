<?php

// Dashboard > Courses > Overview

use Domains\Course\Models\Course;

Breadcrumbs::for('courses.overview', function ($trail, $slug) {
    $trail->parent('dashboard');
    $trail->push(Course::whereSlug($slug ?? request()->course)->first()->title, route('courses.overview', $slug ?? request()->course));
});

Breadcrumbs::for('courses.topics', function ($trail, $slug) {
    $trail->parent('courses.overview', $slug);
    $trail->push('Topics', route('courses.topics', $slug ?? request()->course));
});

Breadcrumbs::for('courses.batches', function ($trail, $slug) {
    $trail->parent('courses.overview', $slug);
    $trail->push('Batches', route('courses.batches', $slug ?? request()->course));
});

Breadcrumbs::for('courses.levels', function ($trail, $slug) {
    $trail->parent('courses.overview', $slug);
    $trail->push('Levels', route('courses.levels', $slug ?? request()->course));
});

Breadcrumbs::for('courses.students', function ($trail, $slug) {
    $trail->parent('courses.overview', $slug);
    $trail->push('Students', route('courses.students', $slug ?? request()->course));
});

Breadcrumbs::for('courses.cost', function ($trail, $slug) {
    $trail->parent('courses.overview', $slug);
    $trail->push('C
    ost', route('courses.cost', $slug ?? request()->course));
});


// Dashboard > Courses > Edit
Breadcrumbs::for('courses.edit', function ($trail, $slug) {
    $trail->parent('courses.overview', $slug);
    $trail->push(Course::whereSlug($slug ?? request()->course)->first()->title, route('courses.edit', $slug ?? request()->course));
});
