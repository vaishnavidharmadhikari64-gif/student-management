@csrf
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $student->name) }}"
               class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $student->email) }}"
               class="form-control @error('email') is-invalid @enderror">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $student->phone) }}"
               class="form-control @error('phone') is-invalid @enderror">
        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth"
               value="{{ old('date_of_birth', optional($student->date_of_birth)->format('Y-m-d')) }}"
               class="form-control @error('date_of_birth') is-invalid @enderror">
        @error('date_of_birth') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach (['male', 'female', 'other'] as $g)
                <option value="{{ $g }}" @selected(old('gender', $student->gender) == $g)>{{ ucfirst($g) }}</option>
            @endforeach
        </select>
        @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Course</label>
        <select name="course_id" class="form-select @error('course_id') is-invalid @enderror">
            <option value="">-- Select --</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" @selected(old('course_id', $student->course_id) == $course->id)>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        @error('course_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Address</label>
        <textarea name="address" rows="3"
                  class="form-control @error('address') is-invalid @enderror">{{ old('address', $student->address) }}</textarea>
        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mt-3">
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
</div>