<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use App\User;
use App;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->course_id = $request->course;

        $user->save();

        return redirect('courses');
    }

    public function edit($id)
    {

    }
}
