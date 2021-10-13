<x-layouts.app>
    <x-slot name="title">
        Users
    </x-slot>
    <div class="d-flex justify-content-end mb-3">
        <x-button name="create" :href="route('users.create')" permission="create-users" class="btn btn-sm btn-primary" icon="bi bi-plus" />
    </div>
    <x-card>
        <x-slot name="body">
            <livewire:users-table />
        </x-slot>
    </x-card>
</x-layouts.app>