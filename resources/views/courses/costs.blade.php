@extends('courses.show')
@section('course', $course)
@section('content')
<livewire:courses.costs :course="$course" />
@endsection