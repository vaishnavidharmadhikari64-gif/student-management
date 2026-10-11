@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
<h3>Add Student</h3>
<form method="POST" action="{{ route('students.store') }}">
    @include('students._form')
</form>
@endsection