@extends('layouts.app')
@section('title', $student->name)
@section('content')
<h3>{{ $student->name }}</h3>
<table class="table bg-white">
    <tr><th width="200">Email</th><td>{{ $student->email }}</td></tr>
    <tr><th>Phone</th><td>{{ $student->phone }}</td></tr>
    <tr><th>Date of Birth</th><td>{{ $student->date_of_birth->format('d M Y') }}</td></tr>
    <tr><th>Gender</th><td>{{ ucfirst($student->gender) }}</td></tr>
    <tr><th>Course</th><td>{{ $student->course->name }}</td></tr>
    <tr><th>Address</th><td>{{ $student->address ?? '-' }}</td></tr>
</table>
<a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
@endsection