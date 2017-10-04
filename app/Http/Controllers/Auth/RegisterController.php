<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:7|confirmed',
            'birthDate' => 'required|date',
            'schooling' => 'required',
            'sex' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $birth_date = strtotime($data['birthDate']);
        $pic_name = "";

        if (is_null($_FILES))
        {
            if ($data['sex'] == 'Male')
            {
                //default male picture, for when the user does not upload a picture
                $path = public_path() . '/uploads/default_m.jpeg';
                $pic_name = 'default_m.jpeg';
            }
            else
            {
                //default female picture, for when the user does not upload a picture
                $path = public_path() . '/uploads/default_f.jpeg';
                $pic_name = 'default_f.jpeg';
            }
        }
        else
        {
            $picture = $_FILES;

            $pic_dir = public_path() . '/uploads'; //everything that is supposed to be used by the browser needs to be in the public folder, as such the uploads folder is located there
            //path to the folder where the picture will be stored
            $pic_name = $data['email'] . ".jpg";
            //name that will be given to the folder

            $path = $pic_dir . $pic_name;

            $picture->move($path);
            //moving the picture to the specified

            //path that will be passed onto the user

            //$path = $data->file('picture')->store('pictures');
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'birth_date' => date('Y-m-d',$birth_date),
            'schooling' => $data['schooling'],
            'sex' => $data['sex'],
            'user_type' => '1',
            'picture' => $pic_name
        ]);
    }
}
