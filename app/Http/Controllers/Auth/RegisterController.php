<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\User;
use App\Http\Controllers\Controller;
use Faker\Provider\Image;
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

    /*
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /*
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /*
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        /*sets a variable to actual data less 18 years*/
        $validator_date = Carbon::now()->subYears(18);

        /*Validates all data from inputs*/
        return Validator::make($data, [
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:7|confirmed',
            'birthDate' => 'required|date|after:1900-01-01|before:' . $validator_date,
            'schooling' => 'required',
            'picture' => 'image|mimes:jpeg,bmp,png,jpg|max:500000',
            'sex' => 'required',
        ]);
    }

    /*
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*sets to a variable the data from the input to a date type*/
        $birth_date = strtotime($data['birthDate']);

        /*checks if picture from data is null or empty*/
        if ($_FILES['picture']['name'] === null || empty($_FILES['picture']['name']))
        {
            if ($data['sex'] == 'Male')
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
            //attributing the picture to a variable
            $picture = $data['picture'];

            //name that will be given to the picture
            $pic_name = $data['email'] . '_' . $_FILES['picture']['name'];

            //path to the folder where the picture will be stored
            $new_path = public_path() . '/uploads/' . $pic_name;

            //moving the picture to the specified folder
            move_uploaded_file($picture,$new_path);
        }

        /*returns a new user created with all the data from the inputs*/
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
