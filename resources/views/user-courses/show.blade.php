<x-layouts.app>
    <x-slot name="title">
        {{ $userCourse->course->title }}
    </x-slot>
    <livewire:user.view-course :userCourse="$userCourse" />
</x-layouts.app>