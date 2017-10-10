<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;

class UserCourseController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->course_id = $request->course;

        $user->save();

        return redirect('courses');
    }
}
