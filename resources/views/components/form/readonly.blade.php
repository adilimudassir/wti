{{ html()->label(ucfirst(str_replace("_", " ",$name)))
    ->class('form-label fs-6 fw-bolder text-dark mt-5')
    ->for($name)
}}
{{ html()->text($name)
    ->class('form-control form-control-lg ')
    ->value($value)
    ->readonly()
}}