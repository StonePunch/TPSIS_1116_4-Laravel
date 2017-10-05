<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use \App\Schooling;

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
        return view('admin');
    }

    function register()
    {
        //$user_type = \App\UserType::all();
        $schooling = Schooling::all();

        //return view('auth.register')->with('user_types', $user_type)->with('schooling', $schooling);
        return view('auth.register')->with(['schooling' => $schooling]);
    }

    function manage()
    {
        $user = User::class;

        return view('manage')->with('user', $user);
    }
}
