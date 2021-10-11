<x-layouts.app>
    <x-slot name="title">
        Edit Role
    </x-slot>
    {{ html()->modelForm($role, 'PATCH', route('roles.update', $role->id))->class('form-horizontal')->open() }}
    <x-partials.card>
        <x-slot name="body">
            @include('roles.form')
        </x-slot>
        <x-slot name="footer">
            <x-utils.form-submit-actions-buttons :back="route('roles.show', $role)" />
        </x-slot>
    </x-partials.card>
    {{ html()->form()->close() }}
</x-layouts.app>