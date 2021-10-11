<x-layouts.app>
    <x-slot name="title">
        Create Role
    </x-slot>
    {{ html()->form('POST', route('roles.store'))->class('form-horizontal')->open() }}
    <x-partials.card>
        <x-slot name="body">
            @include('roles.form')
        </x-slot>
        <x-slot name="footer">
            <x-utils.form-submit-actions-buttons :back="route('roles.index')" />
        </x-slot>
    </x-partials.card>
    {{ html()->form()->close() }}
</x-layouts.app>