
<x-layouts.app>
    <x-slot name="title">
        {{ $course->title }}
    </x-slot>
    <livewire:courses.levels :course="$course" />
    <div class="separator my-10"></div>
    <livewire:courses.topics :course="$course" />
</x-layouts.app>