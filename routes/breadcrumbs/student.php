<?php

// Dashboard > Students > Index
Breadcrumbs::for('students.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Students', route('students.index'));
});

// Dashboard > Students > Index > Show
Breadcrumbs::for('students.show', function ($trail, $studentID) {
    $trail->parent('students.index');
    $trail->push('View', route('students.show', $studentID));
});

// Dashboard > Students > Index > Create
Breadcrumbs::for('students.create', function ($trail) {
    $trail->parent('students.index');
    $trail->push('Create', route('students.create'));
});

// Dashboard > Students > Index > Edit
Breadcrumbs::for('students.edit', function ($trail, $studentID) {
    $trail->parent('students.index');
    $trail->push('Edit', route('students.edit', $studentID));
});

// Dashboard > Students > Index > Change Password
Breadcrumbs::for('students.change-password', function ($trail, $studentID) {
    $trail->parent('students.index');
    $trail->push('Change Password', route('students.change-password', $studentID));
});
