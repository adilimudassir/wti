@extends('courses.show')
@section('course', $course)
@section('content')
<livewire:courses.batches :course="$course" />
@endsection