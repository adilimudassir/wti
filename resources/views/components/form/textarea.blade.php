@props([
'name' => '',
'label' => $label ?? ucwords(str_replace("_", " ",$name)),
'cols' => $cols ?? 5,
'rows' => $rows ?? 5,
])

{{ html()->label($label)
    ->class('form-label fs-6 fw-bolder text-dark')
    ->for($name)
}}
{{ html()->textarea($name)
    ->class('form-control form-control-lg form-control-solid')
    ->classIf($errors->has($name), 'is-invalid')
    ->attributes($attributes)
    
    ->cols($cols)
    ->rows($rows)
}}
@error($name)
{{ html()->span()->text($message)
        ->class('invalid-feedback font-weight-bold')
        ->attribute('role', 'alert')
    }}
@enderror