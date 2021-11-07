@if(isset($model) && !isset($files))

{{
        html()
            ->modelForm($model, $method, $route)
            ->class('form-horizontal')
        ->open() 
    }}

    <x-card>
    <x-slot name="body">
        {{ $slot }}
    </x-slot>
    <x-slot name="footer">
        <x-form.actions label="Update" />
    </x-slot>
</x-card>


{{ html()->closeModelForm() }}
@endif

@if(isset($model) && isset($files))

{{
        html()
            ->modelForm($model, $method, $route)
            ->class('form-horizontal')
            ->acceptsFiles()
        ->open() 
    }}

    <x-card>
    <x-slot name="body">
        {{ $slot }}
    </x-slot>
    <x-slot name="footer">
        <x-form.actions label="Update" />
    </x-slot>
</x-card>

{{ html()->closeModelForm() }}
@endif

@if(isset($files) && !isset($model))

{{
        html()
            ->form($method, $route)
            ->class('form-horizontal')
            ->acceptsFiles()
        ->open() 
    }}

<x-card>
    <x-slot name="body">
        {{ $slot }}
    </x-slot>
    <x-slot name="footer">
        <x-form.actions label="Submit" />
    </x-slot>
</x-card>

{{ html()->form()->close() }}
@endif


@if(!isset($model) && !isset($files))

{{
        html()
            ->form($method, $route)
            ->class('form-horizontal')
        ->open() 
    }}

<x-card>
    <x-slot name="body">
        {{ $slot }}
    </x-slot>
    <x-slot name="footer">
        <x-form.actions label="Submit" />
    </x-slot>
</x-card>

{{ html()->form()->close() }}
@endif  