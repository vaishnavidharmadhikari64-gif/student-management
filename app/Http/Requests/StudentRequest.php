<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('student')?->id;

        return [
            'name'          => ['required', 'string', 'min:3', 'max:255'],
            'email'         => ['required', 'email', Rule::unique('students', 'email')->ignore($id)],
            'phone'         => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'gender'        => ['required', Rule::in(['male', 'female', 'other'])],
            'course_id'     => ['required', 'exists:courses,id'],
            'address'       => ['nullable', 'string', 'max:500'],
        ];
    }
}