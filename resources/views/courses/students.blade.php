@extends('courses.show')
@section('course', $course)
@section('content')
<x-card>
    <x-slot name="header">
        Registered Students
    </x-slot>
    <x-slot name="body">
        <livewire:course-students-table :course="$course" />
    </x-slot>
</x-card>
@endsection