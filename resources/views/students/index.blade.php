<x-layouts.app>
    <x-slot name="title">
        Students
    </x-slot>
    <div class="d-flex justify-content-end mb-3">
        <x-button name="create" :href="route('students.create')" permission="create-students" class="btn btn-sm btn-primary" icon="bi bi-plus" />
    </div>
    <x-card>
        <x-slot name="body">
            <livewire:students-table />
        </x-slot>
    </x-card>
</x-layouts.app>