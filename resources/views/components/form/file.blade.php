@props([
'name' => '',
'label' => $label ?? ucwords(str_replace("_", " ",$name))
])

        {{ html()->label($label)
    ->class('form-label fs-6 fw-bolder text-dark')
    ->for($name)
}}


        {{ html()->file($name)
    ->class('form-control form-control-lg form-control-solid')
    ->classIf($errors->has($name), 'is-invalid')
    ->attributes($attributes)
    
}}
        @error($name)
        {{ html()->span()->text($message)
        ->class('invalid-feedback font-weight-bold')
        ->attribute('role', 'alert')
    }}
        @enderror
