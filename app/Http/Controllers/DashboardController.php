<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalStudents' => Student::count(),
            'totalCourses'  => Course::count(),
            'recent'        => Student::with('course')->latest()->take(5)->get(),
        ]);
    }
}