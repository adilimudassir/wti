@extends('courses.show')
@section('course', $course)
@section('content')
<livewire:courses.topics :course="$course" />
@endsection