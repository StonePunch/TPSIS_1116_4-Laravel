<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use App\Course;
use Illuminate\Support\Facades\DB;

class UserCourseController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->course_id = $request->course;

        $user->save();

        return redirect('courses');
    }
    public function destroy($id)
    {
        /*Dissociating the teacher and the course*/
        User::where('id','=',Course::find($id)->teacher_id)->update(['course_id' => null]);

        /*Dissociating the students and the course*/
        User::where('course_id','=',$id)->update(['course_id' => null]);

        /*Deleting the course*/
        DB::table('courses')->where('id','=',$id)->delete();

        return redirect('courses');
    }
}
