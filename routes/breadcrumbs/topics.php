<?php

use Domains\Course\Models\Topic;

// Dashboard > Topics > Show
Breadcrumbs::for('topics.show', function ($trail, $slug) {
    $trail->parent('courses', Topic::whereSlug($slug)->first()->level?->course?->slug);
    $trail->push('View Topic', route('topics.show', $slug));
});

// Dashboard > Topics > Create
Breadcrumbs::for('topics.create', function ($trail, $slug) {
    $trail->parent('courses', $slug);
    $trail->push('Create Topic', route('topics.create', $slug));
});

// Dashboard > Topics > Edit
Breadcrumbs::for('topics.edit', function ($trail, $id) {
    $trail->parent('courses', Topic::find($id)->first()->level?->course?->slug);
    $trail->push('Edit Topic', route('topics.edit', $id));
});
