<?php

namespace App\Http\Controllers;

use App\Course;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses', compact('courses'));
    }
}
