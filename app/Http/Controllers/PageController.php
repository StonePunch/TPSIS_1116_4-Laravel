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
        /*Check if user is logged in*/
        if (Auth::check()) {
            /*Check if logged user is admin*/
            if (Auth::user()->user_type != 3) {
                return redirect('users_no_permission_error');
            }
            return redirect('courses');
        } else {
            return redirect('users_no_permission_error');
        }
    }

    function register()
    {
        /*Check if user is logged in*/
        if (Auth::check()) {
            return redirect('users_no_permission_error');
        }

        /*gets all data from schooling to fill the input*/
        $schooling = Schooling::all();

        return view('auth.register')->with(['schooling' => $schooling]);
    }

    function manage()
    {
        //if user not logged in goes to error page
        if (Auth::guest()) {
            return view('users_no_permission_error');
        }

        $user = User::class;

        return view('manage')->with('user', $user);
    }

    function user_no_permission_error()
    {
        return view('users_no_permission_error');
    }

    function navcolor($number)
    {
        $string = "";
        if($number == "boas")
        {
            $string = "<li class=\"active\" id=\"firstLink\"><a style=\"background-color: rgba(0, 0, 0, 0.75); background: transparent\" href=\"/\" class=\"scroll-link\">Home</a></li>
                        <li><a href=\"/courses\" class=\"scroll-link\">Courses</a></li>
                        <li><a href=\"/news\" class=\"scroll-link\">News</a></li>
                        <li><a href=\"/about\" class=\"scroll-link\">About</a></li>
                        <li><a href=\"/contacts\" class=\"scroll-link\">Contacts</a></li>
                        <li class=\"login\"><a style=\"color: #FFDF00\" href=\"{{ route('login') }}\">Login</a></li>
                        <li class=\"login\"><a href=\"{{ route('registry') }}\">Register</a></li>";
        }

        return view('layout.master', compact('string'));
    }
}
