<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use App\Course;
use App\Grade;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        /*Retrieves all the courses and sends in to a view*/
        $courses = Course::where('status','=',true)->orderBy('start_date','asc')->get();
        return view('courses', compact('courses'));
    }

    public function create()
    {
        /*Check if there is a logged user and if he is an admin*/
        if(Auth::guest() || Auth::User()->user_type !== 3)
        {
            return view('users_no_permission_error');
        }

        /*Gets a list of teachers that are not teaching any course*/
        $teachers = DB::table('users')->where('user_type', '=', 2)->whereNull('course_id')->get();

        /*Returns a view with the information of the selected course already displayed*/
        return view('course_create',compact('teachers'));
    }

    public function store(request $request)
    {
        /*Check if there is a logged user and if he is an admin*/
        if(Auth::guest() || Auth::User()->user_type !== 3)
        {
            return view('users_no_permission_error');
        }

        /*Validates all data from inputs*/
        $validator_date = Carbon::now();
        $this->validate($request, array(
            'name' => 'required|string|max:50',
            'description' => 'required|max:400',
            'duration' => 'required|numeric|between:10,999',
            'start_date' => 'required|date|unique:courses|after:' . $validator_date . '|before:' . $validator_date->addYear(2),
        ));

        /*Creates a new course with all data from the request and saves it in database*/
        $course = new Course();

        $course->name = $request->name;
        $course->description = $request->description;
        $course->duration = $request->duration;
        $course->start_date = date('Y-m-d', strtotime($request->start_date)); //"strtotime" converts the string into a date
        $course->teacher_id = $request->teacher;
        $course->status = true;

        $course->save();

        /*Associating the course to the teacher*/
        User::where('id','=',$request->teacher)->update(['course_id' => $course->id]);

        return redirect('courses');
    }

    public function update(request $request, $id)
    {
        /*Check if there is a logged user and if he is an admin*/
        if(Auth::guest() || Auth::User()->user_type !== 3)
        {
            return view('users_no_permission_error');
        }

        /*Validates all data from inputs*/
        $course = Course::find($id);

        $validator_date_min = Carbon::now();
        $old_start_date = $course->start_date;

        if ($old_start_date != $request->start_date)
        {
            $validator_date_unique = '|unique:courses';
        }
        else
        {
            $validator_date_unique = '';
        }

        $this->validate($request, array(
            'name' => 'required|string|max:50',
            'description' => 'required|max:400',
            'duration' => 'required|numeric|between:10,999',
            'start_date' => 'required|date' . $validator_date_unique . '|after:' . $validator_date_min . '|before:' . $validator_date_min->addYear(2),
        ));

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

            /*Associating the course to the teacher*/
            //User::find($request->teacher)->update(['course_id' => $course->id]); //TODO: Check why this does not work
            User::where('id','=',$request->teacher)->update(['course_id' => $course->id]);

            /*Associating the new teacher to the course*/
            $course->teacher_id = $request->teacher;
        }

        /*Saving all changes to the database*/
        $course->save();

        return redirect('courses');
    }

    public function edit($id)
    {
        /*Check if there is a logged user and if he is an admin*/
        if(Auth::guest() || Auth::User()->user_type !== 3)
        {
            return view('users_no_permission_error');
        }

        /*Gets the course associated with the passed id*/
        $course = Course::find($id);

        /*
         * Gets a list of teachers that are not teaching any course, as well as the teacher currently associated with the course;
         * First element of the list is the current teacher, followed by the others, ordered alphabetically.
        */
        $teachers = DB::table('users')->where('user_type', '=', 2)->whereNull('course_id')->orWhere('id', '=', $course->teacher_id)->orderBy('course_id', 'desc')->orderBy('name', 'asc')->get();

        /*Returns a view with the information of the selected course already displayed*/
        return view('course_create', compact('course', 'teachers'));
    }

    public function destroy($id)
    {
        /*Check if there is a logged user and if he is an admin*/
        if(Auth::guest() || Auth::User()->user_type !== 3)
        {
            return view('users_no_permission_error');
        }

        /*Dissociating the teacher and the course*/
        User::where('id', '=', Course::find($id)->teacher_id)->update(['course_id' => null]);

        /*Dissociating the students and the course*/
        User::where('course_id', '=', $id)->update(['course_id' => null]);

        /*Dissociating grades on that course*/
        //Grade::where('course_id', '=', $id)->update(['status' => false]);

        /*Deleting the course*/
        DB::table('courses')->where('id', '=', $id)->update(['status' => false]);

        return redirect('courses');
    }
}
