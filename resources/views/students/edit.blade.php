@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
<h3>Edit Student</h3>
<form method="POST" action="{{ route('students.update', $student) }}">
    @method('PUT')
    @include('students._form')
</form>
@endsection