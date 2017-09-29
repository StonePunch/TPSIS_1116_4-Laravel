<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function home()
    {
        return view('home');
    }

    function courses()
    {
        return view('courses');
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

    function manage()
    {
        return view('manage');
    }
}
