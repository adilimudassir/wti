@props([
'multiple' => false,
'name' => '',
'labelName' => '',
'value' => '',
'checked' => false,
'id' => ''
])

@php
$labelID = 'label_'.$name.'_'.$id;
$inputID = $name.'_'.$id;
@endphp

<!-- if not multiple checkboxes, Display a label -->
@if(!$multiple)
{{
        html()->label(ucfirst($name))->class('form-label fs-6 fw-bolder text-dark')
    }}
@endif

{{
    html()->div()
        ->class('form-check form-check-custom form-check-solid my-2')
        ->children([
            html()
                ->checkbox($multiple ? $name.'[]' : $name)
                ->id($inputID)
                ->checked($checked)
                ->value($value)
                ->attributes($attributes->whereStartsWith('wire'))
                ->class('form-check-input'),

            html()
                ->label($labelName)
                ->for($inputID)
                ->id($labelID)
                ->class('form-check-label')

        ])
}}