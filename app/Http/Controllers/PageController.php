<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schooling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        if(Auth::check())
        {
            $user_type = Auth::user()->user_type;
            if ($user_type != 3)
            {
                return redirect('users_no_permission_error');
            }
            return view('admin');
        }
        else
            return redirect('users_no_permission_error');
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
