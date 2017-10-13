<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grade;
use Illuminate\Support\Facades\Auth;

class UserGradeController extends Controller
{
    public function index()
    {
        //if user not logged or user is not a student goes to error page
        if(Auth::guest() || Auth::User()->user_type === 2)
        {
            return view('users_no_permission_error');
        }
        else if(Auth::User()->user_type === 3)
        {
            $grades = Grade::all();
            return view('comments')->with('grades', $grades);
        }

        $Loggeduser = Auth::User()->id;

        $grades = Grade::where('user_id','=',$Loggeduser)->get();

        //return view with all the grades from the logged user
        return view('grades')->with('grades',$grades);
    }

    public function store(Request $request)
    {
        //if user not logged in or user is different than teacher goes to error page
        if(Auth::guest() || Auth::User()->user_type === 1 || Auth::User()->user_type === 3)
        {
            return view('users_no_permission_error');
        }

        /*validates if grade is valid*/
        $this->validate($request, array(
            'grade' => 'required|numeric|between:0,20',
        ));

        /*Finds the student that the teacher attributed the grade*/
        $user = User::find($request->get('user_id'));

        $grade = new Grade();

        $grade->grade = $request->grade;
        $grade->user_id = $user->id;
        $grade->course_id = $user->course_id;

        /*Creates a new record of grade for the student with the course and the teacher associated*/
        $grade->save();
        return redirect('users');
    }

    public function update(Request $request, $id)
    {
        //if user not logged in or user is different than teacher goes to error page
        if(Auth::guest() || Auth::User()->user_type === 2 || Auth::User()->user_type === 3)
        {
            return view('users_no_permission_error');
        }

        $grade = Grade::find($request->get('grade_id'));
        $grade->comment = $request->get('comment');

        /*Creates a new record of grade for the student with the course and the teacher associated*/
        $grade->save();

        return redirect('grades');
    }

    public function destroy($id)
    {
        /*Check if there is a logged user and if he is an admin*/
        if(Auth::guest() || Auth::User()->user_type !== 3)
        {
            return view('users_no_permission_error');
        }

        if (User::find($id)->user_type == 2)
        {
            /*Dissociating the teacher and the course*/
            Course::where('teacher_id', '=', $id)->update(['teacher_id' => null]);

            /*Deleting the user*/
            DB::table('users')->where('id','=',$id)->delete();

            return redirect('users');
        }
        if (User::find($id)->user_type == 1)
        {
            /*Deleting grades pertaining to the student*/
            DB::table('grades')->where('user_id','=', $id)->delete();

            /*Deleting the user*/
            DB::table('users')->where('id','=',$id)->delete();

            return redirect('users');
        }

    }
}
