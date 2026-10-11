@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row mb-4">
    <div class="col-md-6 mb-3">
        <div class="card text-center"><div class="card-body">
            <h5>Total Students</h5><h2>{{ $totalStudents }}</h2>
        </div></div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card text-center"><div class="card-body">
            <h5>Total Courses</h5><h2>{{ $totalCourses }}</h2>
        </div></div>
    </div>
</div>

<h5>Recently Added Students</h5>
<ul class="list-group">
    @forelse ($recent as $s)
        <li class="list-group-item">
            <a href="{{ route('students.show', $s) }}">{{ $s->name }}</a>
            <span class="text-muted">({{ $s->course->name }})</span>
        </li>
    @empty
        <li class="list-group-item text-muted">No students yet.</li>
    @endforelse
</ul>
@endsection