{{ html()->label(ucfirst(str_replace("_", " ",$name)))
    ->class('form-control-label')
    ->for($name)
}}
{{ html()->text($name)
    ->class('form-control')
    ->value($value)
    ->readonly()
}}