<x-layouts.app>
    <x-slot name="title">
        Users
    </x-slot>
    <div class="d-flex justify-content-end mb-3">
        @can('create-users')
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus fs-3"></i>CREATE
        </a>
        @endcan
    </div>
    <x-partials.card>
        <x-slot name="body">
            <livewire:users-table />
        </x-slot>
    </x-partials.card>
</x-layouts.app>