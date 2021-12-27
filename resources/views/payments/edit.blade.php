<x-layouts.app>
    <x-slot name="title">
        Edit Role
    </x-slot>
    {{
        html()
            ->modelForm($role, 'PATCH', route('roles.update', $role->id))
            ->class('form-horizontal')
        ->open() 
    }}

    <x-card>
        <x-slot name="body">
            @include('roles.form')
        </x-slot>
        <x-slot name="footer">
            <x-form.actions label="Update" :back-route="route('roles.show', $role)" />
        </x-slot>
    </x-card>
    {{ html()->closeModelForm() }}
</x-layouts.app>