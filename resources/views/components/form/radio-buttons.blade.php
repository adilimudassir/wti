@props([
'options' => [],
'label' => '',
'name' => '',
])

{{
    html()->label(ucfirst($label))->class('form-label fs-6 fw-bolder text-dark mt-5')
}}

<div class="d-flex flex-row mx-2">
    @foreach($options as $key => $value)
    <div class="me-2">
        {{
            html()
                ->span()
                ->class('radio-custom')
                ->children([
                    html()
                        ->radio($name)
                        ->value($value)
                        ->attributes($attributes)
                        ->id($name.'_'.$key)
                        ,

                    html()
                        ->label(ucfirst($key))
                        ->for($name.'_'.$key)
                        ->class('mx-2')
                ])
        }}
    </div>
    @endforeach
</div>