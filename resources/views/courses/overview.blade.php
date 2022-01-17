<x-layouts.app>
    <x-slot name="title">
        {{ $course->title }}
    </x-slot>
    <x-card>
        <x-slot name="header">
            Registered Students
        </x-slot>
        <x-slot name="body">
            <livewire:course-students-table :course="$course" />
        </x-slot>
    </x-card>
    <div class="separator my-5"></div>

    <livewire:courses.topics :course="$course" />
    <div class="separator my-5"></div>
    <livewire:courses.levels :course="$course" />
    <div class="separator my-5"></div>
    <livewire:courses.batches :course="$course" />
    <div class="separator my-5"></div>
    <livewire:courses.costs :course="$course" />
</x-layouts.app>