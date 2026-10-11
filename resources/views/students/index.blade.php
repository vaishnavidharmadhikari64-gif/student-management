@extends('layouts.app')
@section('title', 'Students')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Students</h3>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

<form method="GET" class="row g-2 mb-3">
    <div class="col-md-5">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or email">
    </div>
    <div class="col-md-3">
        <select name="sort" class="form-select">
            <option value="created_at" @selected(request('sort') == 'created_at')>Date added</option>
            <option value="name" @selected(request('sort') == 'name')>Name</option>
        </select>
    </div>
    <div class="col-md-2">
        <select name="dir" class="form-select">
            <option value="desc" @selected(request('dir') == 'desc')>Descending</option>
            <option value="asc" @selected(request('dir') == 'asc')>Ascending</option>
        </select>
    </div>
    <div class="col-md-2 d-grid">
        <button class="btn btn-outline-secondary">Search</button>
    </div>
</form>

<div class="table-responsive">
<table class="table table-bordered table-striped bg-white align-middle">
    <thead>
        <tr>
            <th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Gender</th><th width="220">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->course->name }}</td>
            <td>{{ ucfirst($student->gender) }}</td>
            <td>
                <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this student?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">No students found.</td></tr>
    @endforelse
    </tbody>
</table>
</div>

{{ $students->links() }}
@endsection