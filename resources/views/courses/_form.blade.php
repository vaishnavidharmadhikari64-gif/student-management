@csrf
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Course Name</label>
        <input type="text" name="name" value="{{ old('name', $course->name) }}"
               class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $course->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
<div class="mt-3">
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
</div>