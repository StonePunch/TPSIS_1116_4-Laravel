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
        //if user not logged in goes to error page
        if(Auth::guest()    )
        {
            return view('users_no_permission_error');
        }

        $Loggeduser = Auth::User()->id;

        $grades = Grade::where('user_id','=',$Loggeduser)->get();

        //return view with all the grades from the logged user
        return view('grades')->with('grades',$grades);
    }

    public function update(Request $request, $id)
    {
        //if user not logged in or user is different than admin or teacher goes to error page
        if(Auth::guest() || Auth::User()->user_type === 1)
        {
            return view('users_no_permission_error');
        }

        /*validates if grade is valid*/
        $this->validate($request, array(
            'grade' => 'required|numeric|between:0,20',
        ));

        $user = User::find($id);

        $grade = new Grade();

        $grade->grade = $request->grade;
        $grade->user_id = $user->id;
        $grade->course_id = $user->course_id;

        $grade->save();
        return redirect('users');
    }
}
