<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use App\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function create()
    {

    }

    public function update(request $request, $id)
    {
        $course = Course::find($id);

        $course->name = $request->name;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->start_date = date('Y-m-d',strtotime($request->start_date));
        $course->teacher_id = $request->teacher;

        $course->save();

    }

    public function edit($id)
    {
        $course = Course::find($id);

        $teachers = DB::table('users')->where('user_type', '=', 2)->whereNull('course_id')->orWhere('id', '=', $course->teacher_id)->orderBy('course_id', 'desc')->orderBy('name', 'asc')->get();
        /*Returning the view with the relevant courses information already entered*/
        return view('course_create', compact('course', 'teachers'));
    }

    public function destroy($id)
    {
        /*Dissociating the teacher and the course*/
        User::where('id', '=', Course::find($id)->teacher_id)->update(['course_id' => null]);

        /*Dissociating the students and the course*/
        User::where('course_id', '=', $id)->update(['course_id' => null]);

        /*Deleting the course*/
        DB::table('courses')->where('id', '=', $id)->delete();

        return redirect('courses');
    }
}
