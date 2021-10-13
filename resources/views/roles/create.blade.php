<x-layouts.app>
    <x-slot name="title">
        Create Role
    </x-slot>
    <x-form method="POST" :route="route('roles.store')" :back-route="route('roles.index')">
        @include('roles.form')
    </x-form>
</x-layouts.app>