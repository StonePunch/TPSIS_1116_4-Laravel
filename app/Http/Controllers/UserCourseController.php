<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function update(Request $request, $id)
    {
        //if user not logged in or user is different than admin or student goes to error page
        if(Auth::guest() || Auth::User()->user_type === 2)
        {
            return view('users_no_permission_error');
        }

        $user = User::find($id);

        $user->course_id = $request->course;

        $user->save();

        return redirect('courses');
    }
}
