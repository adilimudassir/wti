<x-layouts.app>
    <x-slot name="title">
        {{ $course->title }}
    </x-slot>
    <livewire:courses.topics :course="$course" />
    <div class="separator my-5"></div>
    <livewire:courses.levels :course="$course" />
    <div class="separator my-5"></div>
    <livewire:courses.costs :course="$course" />
</x-layouts.app>