<?php

// Dashboard > Payments > Index
Breadcrumbs::for('payments.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Payments', route('payments.index'));
});

// Dashboard > Payments > Index > Show
Breadcrumbs::for('payments.show', function ($trail, $paymentID) {
    $trail->parent('payments.index');
    $trail->push('View', route('payments.show', $paymentID));
});

// Dashboard > Payments > Index > Create
Breadcrumbs::for('payments.create', function ($trail) {
    $trail->parent('payments.index');
    $trail->push('Create', route('payments.create'));
});

// Dashboard > Payments > Index > Edit
Breadcrumbs::for('payments.edit', function ($trail, $paymentID) {
    $trail->parent('payments.index');
    $trail->push('Edit', route('payments.edit', $paymentID));
});
