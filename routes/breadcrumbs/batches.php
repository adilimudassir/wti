<?php


// Dashboard > Batches > Show
Breadcrumbs::for('batches.show', function ($trail, $id) {
    $trail->parent('dashboard');
    $trail->push('My Courses', route('batches.show', $id));
});
