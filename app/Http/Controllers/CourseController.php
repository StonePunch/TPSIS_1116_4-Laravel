<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use App\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function create(request $request)
    {
        $course = new Course();

        $course->name = $request->name;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->start_date = date('Y-m-d', strtotime($request->start_date));
        $course->teacher_id = $request->teacher;
    }

    public function update(request $request, $id)
    {
        $course = Course::find($id);
        $old_teacher_id = $course->teacher_id;

        $course->name = $request->name;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->start_date = date('Y-m-d', strtotime($request->start_date));

        if ($old_teacher_id != $request->teacher)
        {
            /*Selected teacher is different*/

            /*Dissociating the teacher and the course*/
            //User::find($old_teacher_id)->update(['course_id' => null]); //TODO: Check why this does not work
            User::where('id','=',$old_teacher_id)->update(['course_id' => null]);

            /*Attributing the course to the teacher*/
            //User::find($request->teacher)->update(['course_id' => $course->id]); //TODO: Check why this does not work
            User::where('id','=',$request->teacher)->update(['course_id' => $course->id]);

            /*Attributing the new teacher to the course*/
            $course->teacher_id = $request->teacher;
        }

        /*Saving all changed to the database*/
        $course->save();

        return redirect('courses');
    }

    public function edit($id)
    {
        $course = Course::find($id);

        $teachers = DB::table('users')->where('user_type', '=', 2)->whereNull('course_id')->orWhere('id', '=', $course->teacher_id)->orderBy('course_id', 'desc')->orderBy('name', 'asc')->get();
        /*Returns a view with the information of the selected course already displayed*/

//        $page_controller = new PageController(); //TODO: Check why this does not work
//        $page_controller->course_create($course,$teachers);

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
