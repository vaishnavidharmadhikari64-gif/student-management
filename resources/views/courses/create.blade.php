@extends('layouts.app')
@section('title', 'Add Course')
@section('content')
<h3>Add Course</h3>
<form method="POST" action="{{ route('courses.store') }}">
    @include('courses._form')
</form>
@endsection