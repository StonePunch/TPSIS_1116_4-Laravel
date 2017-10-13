<?php

namespace App\Http\Controllers;

use App\User;
use App\Schooling;
use Illuminate\Support\Facades\Auth;
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

    function register()
    {
        /*gets all data from schooling to fill the input*/
        $schooling = Schooling::all();

        return view('auth.register')->with(['schooling' => $schooling]);
    }

    function manage()
    {
        //if user not logged in goes to error page
        if(Auth::guest())
        {
            return view('users_no_permission_error');
        }

        $user = User::class;

        return view('manage')->with('user', $user);
    }

    function user_no_permission_error()
    {
        return view('users_no_permission_error');
    }
}
