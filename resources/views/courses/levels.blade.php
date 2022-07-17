@extends('courses.show')
@section('course', $course)
@section('content')
<livewire:courses.levels :course="$course" />
@endsection