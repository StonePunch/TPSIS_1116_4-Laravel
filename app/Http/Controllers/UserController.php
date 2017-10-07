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

    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('manage')->withPost($user);
    }


    public function update(Request $request, $id)
    {
        $validator_date = Carbon::now()->subYears(18);
        $birth_date = strtotime($request->input('birthDate'));

        $this->validate($request, array(
           'name' => 'required|string|max:255',
           'email' => 'required|unique:users,email,'.$id,
           'password' => 'required|string|min:7',
           'birthDate' => 'required|date|after:1900-01-01|before:' . $validator_date,
           'picture' => 'image|mimes:jpeg,bmp,png,jpg|max:50000'
        ));

        $old_file_path = public_path() . '/uploads/' . Auth::user()->picture;

        if(Auth::user()->picture === "default_f.jpeg" || Auth::user()->picture === "default_m.jpeg")
        {

        }
        else
        {
            unlink($old_file_path);
        }

        if ($request['picture'] === null || empty($request['picture']))
        {
            if (Auth::user()->sex == 'Male')
            {
                //default male picture, for when the user does not upload a picture
                $pic_name = 'default_m.jpeg';
            }
            else
            {
                //default female picture, for when the user does not upload a picture
                $pic_name = 'default_f.jpeg';
            }
        }
        else
        {
            $picture = $request['picture'];

            //name that will be given to the picture
            $pic_name = $request->input('email') . '_' . $request->picture->getClientOriginalName();

            //path to the folder where the picture will be stored
            $new_path = public_path() . '/uploads/' . $pic_name;

            //moving the picture to the specified folder
            move_uploaded_file($picture,$new_path);
        }

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->picture = $pic_name;
        $user->birth_date = date('Y-m-d',$birth_date);

        $user->save();

        return redirect('manage');
    }
}
