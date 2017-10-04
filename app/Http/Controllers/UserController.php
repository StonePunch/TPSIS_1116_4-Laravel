<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;

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
        $this->validate($request, array(
           'email' => 'unique:users',
           'password' => 'required|string|min:7|confirmed'
        ));

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return redirect('home');
    }
}
