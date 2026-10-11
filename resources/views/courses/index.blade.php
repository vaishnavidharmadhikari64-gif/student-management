@extends('layouts.app')
@section('title', 'Courses')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Courses</h3>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped bg-white align-middle">
    <thead>
        <tr><th>Name</th><th>Description</th><th>Students</th><th width="160">Actions</th></tr>
    </thead>
    <tbody>
    @forelse ($courses as $course)
        <tr>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description ?? '-' }}</td>
            <td>{{ $course->students_count }}</td>
            <td>
                <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this course?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4" class="text-center">No courses found.</td></tr>
    @endforelse
    </tbody>
</table>
</div>

{{ $courses->links() }}
@endsection