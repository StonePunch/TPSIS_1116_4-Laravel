<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schooling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;

class PageController extends Controller
{
    function home()
    {
        return view('home');
    }

    function news()
    {
        return view('news');
    }

    function about()
    {
        return view('about');
    }

    function contacts()
    {
        return view('contacts');
    }

    function admin()
    {
        /*Check is user logged in*/
        if(Auth::check())
        {
            /*Check if logged user is admin*/
            if (Auth::user()->user_type != 3)
            {
                return redirect('users_no_permission_error');
            }
            return view('admin');
        }
        else
        {
            return redirect('users_no_permission_error');
        }
    }

    function course_create($course = null, $teachers = null)
    {
        /*Check is user logged in*/
        if(Auth::check())
        {
            /*Check if logged user is admin*/
            if (Auth::user()->user_type != 3)
            {
                return redirect('users_no_permission_error');
            }

            /*Check if variables were passed to this function, in case of an edit*/ //TODO: Check why this does not work
//            if($course != null && $teachers != null)
//            {
//                return view('course_create', compact('course', 'teachers'));
//            }

            /*When no variable is passed, it means that it is a create*/

            $teachers = DB::table('users')->where('user_type', '=', 2)->whereNull('course_id');

            dd($teachers);

            return view('course_create', compact('teachers'));
        }
        else
        {
            return redirect('users_no_permission_error');
        }
    }

    function register()
    {
        $schooling = Schooling::all();

        return view('auth.register')->with(['schooling' => $schooling]);
    }

    function manage()
    {
        $user = User::class;

        return view('manage')->with('user', $user);
    }

    function user_no_permission_error()
    {
        return view('users_no_permission_error');
    }
}
