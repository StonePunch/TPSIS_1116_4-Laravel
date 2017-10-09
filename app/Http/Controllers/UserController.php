<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //if user not logged in goes to error page
        if(Auth::guest())
        {
            return view('users_no_permission_error');
        }
        //checks if user is teacher to return a view with only users that are applied in the course that the logged on teacher is giving
        else if(Auth::User()->getUserType->name === 'Teacher')
        {
            $userAuth = Auth::User()->getCourse->id;
            $usersTeacher = App\User::where('course_id', '=', $userAuth)->paginate(5);
            return view('users')->with('usersTeacher', $usersTeacher);
        }
        else
        {
            $usersAdmin = App\User::paginate(10);
            //return view with all the users
            return view('users')->with('usersAdmin', $usersAdmin);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        //return a view with data from the specific user logged in
        return view('manage')->withPost($user);
    }


    public function update(Request $request, $id)
    {
        $validator_date = Carbon::now()->subYears(18);
        $birth_date = strtotime($request->input('birthDate'));
        //validates all the data from the request
        $this->validate($request, array(
            'name' => 'required|string|max:20',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|string|min:7',
            'birthDate' => 'required|date|after:1900-01-01|before:' . $validator_date,
            'picture' => 'image|mimes:jpeg,bmp,png,jpg|max:50000'
        ));

        //In case user didn't upload any file
        if ($request['picture'] === null || empty($request['picture']))
        {
            //In case user didn't upload a file and also has the default picture
            if(Auth::user()->picture === "default_f.jpeg" || Auth::user()->picture === "default_m.jpeg")
            {
                //In case user has male picture
                if (Auth::user()->sex == 'Male')
                {
                    //default male picture, for when the user does not upload a picture
                    $pic_name = 'default_m.jpeg';
                }
                //In case user has female picture
                else
                {
                    //default female picture, for when the user does not upload a picture
                    $pic_name = 'default_f.jpeg';
                }
            }
            //In case user didn't upload a file and also doesn't have the default picture
            else
            {
                $pic_name = Auth::user()->picture;
            }
        }
        //In case user uploaded a file but his picture is the default we don't remove the file
        else if (Auth::user()->picture === "default_f.jpeg" || Auth::user()->picture === "default_m.jpeg")
        {
            $picture = $request['picture'];

            //name that will be given to the picture
            $pic_name = $request->input('email') . '_' . $request->picture->getClientOriginalName();

            //path to the folder where the picture will be stored
            $new_path = public_path() . '/uploads/' . $pic_name;

            //moving the picture to the specified folder
            move_uploaded_file($picture,$new_path);
        }
        //In case user uploaded a file but his picture isn't default we remove the older file
        else
        {
            $picture = $request['picture'];
            $old_file_path = public_path() . '/uploads/' . Auth::user()->picture;

            //name that will be given to the picture
            $pic_name = $request->input('email') . '_' . $request->picture->getClientOriginalName();

            //path to the folder where the picture will be stored
            $new_path = public_path() . '/uploads/' . $pic_name;

            //moving the picture to the specified folder
            move_uploaded_file($picture,$new_path);

            unlink($old_file_path);
        }

        $user = User::find($id);

        //checks if the request password is null or empty, if yes the password will keep the same, if not the password will change to the typed password
        if($request->input('password') === null || empty($request->input('password')))
        {
            $user->password = Auth::user()->password;
        }
        else
        {
            $user->password = bcrypt($request->input('password'));
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->picture = $pic_name;
        $user->birth_date = date('Y-m-d',$birth_date);

        $user->save();

        return redirect('manage');
    }
}
