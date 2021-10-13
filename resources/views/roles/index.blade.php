<x-layouts.app>
    <x-slot name="title">
        Roles
    </x-slot>
    <div class="d-flex justify-content-end mb-3">
        <x-button name="create" :href="route('roles.create')" permission="create-roles" class="btn btn-sm btn-primary" icon="bi bi-plus" />
    </div>
    <x-card>
        <x-slot name="body">
            <livewire:roles-table />
        </x-slot>
    </x-card>
</x-layouts.app>