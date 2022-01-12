@props([
'name' => '',
'label' => $label ?? ucwords(str_replace("_", " ",$name)),
'options' => []
])

{{ html()->label($label)
    ->class('form-label fs-6 fw-bolder text-dark mt-5')
    ->for($name)
}}
{{ html()->select($name, $options)
    ->class('form-control form-control-lg ')
    ->classIf($errors->has($name), 'is-invalid')
    ->placeholder("Select {$label}")
    ->attributes($attributes)
    
}}

@error($name)
{{ html()->span()->text($message)
        ->class('invalid-feedback font-weight-bold')
        ->attribute('role', 'alert')
    }}
@enderror