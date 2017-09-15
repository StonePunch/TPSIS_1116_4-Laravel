<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function home()
    {
        return view('home');
    }

    function about()
    {
        return view('about');
    }

    function contacts()
    {
        return view('contacts');
    }
}
