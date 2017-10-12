<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use App\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        /*gets all data from courses and sends it to a view*/
        $courses = Course::all();
        return view('courses', compact('courses'));
    }

    public function create()
    {
        //if user not logged in or user is different than admin goes to error page
        if(Auth::guest() || Auth::User()->user_type === 1 || Auth::User()->user_type === 2)
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
        //if user not logged in or user is different than admin goes to error page
        if(Auth::guest() || Auth::User()->user_type === 1 || Auth::User()->user_type === 2)
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

        $course->save();

        /*Associating the course to the teacher*/
        User::where('id','=',$request->teacher)->update(['course_id' => $course->id]);

        return redirect('courses');
    }

    public function update(request $request, $id)
    {
        //if user not logged in or user is different than admin goes to error page
        if(Auth::guest() || Auth::User()->user_type === 1 || Auth::User()->user_type === 2)
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
            'teacher' => 'required'
        ));

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
        //if user not logged in or user is different than admin goes to error page
        if(Auth::guest() || Auth::User()->user_type === 1 || Auth::User()->user_type === 2)
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
        //if user not logged in or user is different than admin goes to error page
        if(Auth::guest() || Auth::User()->user_type === 1 || Auth::User()->user_type === 2)
        {
            return view('users_no_permission_error');
        }

        /*Dissociating the teacher and the course*/
        User::where('id', '=', Course::find($id)->teacher_id)->update(['course_id' => null]);

        /*Dissociating the students and the course*/
        User::where('course_id', '=', $id)->update(['course_id' => null]);

        /*Deleting the course*/
        DB::table('courses')->where('id', '=', $id)->delete();

        return redirect('courses');
    }
}
