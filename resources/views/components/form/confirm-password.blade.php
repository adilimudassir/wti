{{ html()->label('Confirm Password')
    ->class('form-label fs-6 fw-bolder text-dark mt-5')
    ->for('password_confirmation')
}}
{{ html()->password('password_confirmation')
    ->class('form-control form-control-lg ')
}}