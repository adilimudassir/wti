@if(isset($model) && !isset($files))

{{
        html()
            ->modelForm($model, $method, $route)
            ->class('form-horizontal')
        ->open() 
    }}
@endif

@if(isset($model) && isset($files))

{{
        html()
            ->modelForm($model, $method, $route)
            ->class('form-horizontal')
            ->acceptsFiles()
        ->open() 
    }}
@endif

@if(isset($files) && !isset($model))

{{
        html()
            ->form($method, $route)
            ->class('form-horizontal')
            ->acceptsFiles()
        ->open() 
    }}
@endif


@if(!isset($model) && !isset($files))

{{
        html()
            ->form($method, $route)
            ->class('form-horizontal')
        ->open() 
    }}
@endif


<x-card>
    <x-slot name="body">
        {{ $slot }}
    </x-slot>
    <x-slot name="footer">
        <x-form.actions :label=" ($method === 'PATCH') ? 'Update' : 'Submit'" />
    </x-slot>
</x-card>


{{ html()->form()->close() }}