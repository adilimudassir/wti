<x-layouts.app>
    <x-slot name="title">
        {{ auth()->user()->name }}'s Courses
    </x-slot>
    <livewire:user.courses :user="auth()->user()" />
</x-layouts.app>