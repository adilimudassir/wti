@props([
'name' => '',
'label' => $label ?? ucwords(str_replace("_", " ",$name))
])

{{ html()->label($label)
    ->class('form-label fs-6 fw-bolder text-dark')
    ->for($name)
}}
@if(str_contains(request()->path(), 'edit') && $filePath !== '')
<img src="{{ Storage::url($filePath ?? '') }}" alt="{{ $name }}">
@endif

{{ html()->file($name)
    ->class('form-control form-control-lg form-control-solid')
    ->classIf($errors->has($name), 'is-invalid')
    ->attributes($attributes->whereStartsWith('wire'))
}}
@error($name)
{{ html()->span()->text($message)
        ->class('invalid-feedback font-weight-bold')
        ->attribute('role', 'alert')
    }}
@enderror