@extends('layouts.app')
@section('title', 'Edit Course')
@section('content')
<h3>Edit Course</h3>
<form method="POST" action="{{ route('courses.update', $course) }}">
    @method('PUT')
    @include('courses._form')
</form>
@endsection