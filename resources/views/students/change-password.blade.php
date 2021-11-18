
@extends('students.show')
@section('student', $student)
@section('title', 'Change Student Password')
@section('content')
<x-form method="POST" :route="route('students.change-password', $student->id)" :back-route="route('students.show', $student->id)">
    <div class="row">
        <div class="form-group col-lg-12">
            <x-form.password name="password" />
        </div>
        <div class="form-group col-lg-12">
            <x-form.confirm-password />
        </div>
    </div>
</x-form>
@endsection