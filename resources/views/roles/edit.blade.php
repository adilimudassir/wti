<x-layouts.app>
    <x-slot name="title">
        Edit Role
    </x-slot>
    <x-form method="PATCH" :model="$role" :route="route('roles.update', $role->id)" :back-route="route('roles.show', $role)">
        @include('roles.form')
    </x-form>
</x-layouts.app>