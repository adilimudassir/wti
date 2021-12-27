{{ html()->label(ucfirst(str_replace("_", " ",$name)))
    ->class('form-label fs-6 fw-bolder text-dark')
    ->for($name)
}}
{{ html()->text($name)
    ->class('form-control form-control-lg form-control-solid')
    ->value($value)
    ->readonly()
}}