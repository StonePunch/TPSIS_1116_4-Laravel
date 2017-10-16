<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserGradeController extends Controller
{
    public function index()
    {
        $Loggeduser = Auth::User();

        //if user not logged or user is not a student goes to error page
        if (Auth::guest())
        {
            return view('users_no_permission_error');
        }
        else if (Auth::User()->user_type === 2)
        {
            $grades = Grade::where([['comment', '<>', 'null'],['course_id','=',$Loggeduser->course_id]])->get();
            return view('comments')->with('grades', $grades);
        }
        else if (Auth::User()->user_type === 3)
        {
            /*gets all grades that have comment*/
            $grades = Grade::where('grade', '<>', 'null')->get();
            return view('comments')->with('grades', $grades);
        }

        /*gets all grades from the logged student*/
        $grades = Grade::where('user_id', '=', $Loggeduser->id)->get();

        //return view with all the grades from the logged user
        return view('grades')->with('grades', $grades);
    }

    public function store(Request $request)
    {
        //if user not logged in or user is different than teacher goes to error page
        if (Auth::guest() || Auth::User()->user_type === 1 || Auth::User()->user_type === 3) {
            return view('users_no_permission_error');
        }

        /*validates if grade is valid*/
        $this->validate($request, array(
            'grade' => 'required|numeric|between:0,20',
        ));

        /*Finds the student that the teacher gave the grade*/
        $user = User::find($request->get('user_id'));

        /*Finds the users grade, if it exists already, in which case it is updated with a new grade value*/
        if (count(Grade::where([['user_id','=',$user->id],['course_id','=',$user->course_id]])->get()) > 0)
        {
            Grade::where([['user_id','=',$user->id],['course_id','=',$user->course_id]])->update(['grade' => $request->grade]);

            return redirect('users');
        }

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
        if (Auth::guest() || Auth::User()->user_type === 2 || Auth::User()->user_type === 3) {
            return view('users_no_permission_error');
        }
        /*fins the grade the user wants to comment*/
        $grade = Grade::find($request->get('grade_id'));
        $grade->comment = $request->get('comment');

        /*Creates a new comment in a specific grade*/
        $grade->save();

        return redirect('grades');
    }

    public function destroy($id)
    {
        /*Check if there is a logged user and if he is authorized*/
        if (Auth::User()->user_type == 3) {
            /*If the the logged in user is the admin, he is requesting the deletion of the grade*/

            DB::table('grades')->where('id', '=', $id)->update(['grade' => null]);
            DB::table('grades')->where('id', '=', $id)->update(['comment' => null]);

            return redirect('grades');
        } else if (Auth::User()->user_type == 2) {
            /*If the the logged in user is a teacher, he is requesting the deletion of a comment*/

            $grade = Grade::find($id);
            $grade->comment = null;
            $grade->save();

            return redirect('grades');
        } else {
            return view('users_no_permission_error');
        }
    }
}
