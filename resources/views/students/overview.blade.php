@extends('students.show')
@section('student', $student)
@section('content')

<x-card>
    <x-slot name="body">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $student->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $student->phone }}</td>
            </tr>
            <tr>
                <th>Account Type</th>
                <td>{{ $student->account_type }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <x-badge :type="$student->isActive() ? 'success' : 'danger'" :name="$student->isActive() ? 'Active' : 'Inactive'" />
                </td>
            </tr>
            <tr>
                <th>Confirmed</th>
                <td>
                    <x-badge :type="$student->hasVerifiedEmail() ? 'success' : 'danger'" :name="$student->hasVerifiedEmail() ? 'Yes' : 'No'" />
                </td>
            </tr>
            <tr>
                <th>Last Login Date</th>
                <td>{{ optional($student->last_login_at)->diffForHumans() }}</td>
            </tr>
            <tr>
                <th>Last Login IP</th>
                <td>{{ $student->last_login_ip }}</td>
            </tr>
        </table>
    </x-slot>
</x-card>
@endsection