<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'date_of_birth', 'gender', 'course_id', 'address'];

    protected $casts = ['date_of_birth' => 'date'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}