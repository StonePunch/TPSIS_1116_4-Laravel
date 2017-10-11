<?php

use App\User;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@home');
Route::get('/courses', 'CoursesController@index');
Route::get('/news', 'PageController@news');
Route::get('/about', 'PageController@about');
Route::get('/admin', 'PageController@admin');
Route::get('/contacts', 'PageController@contacts');
Route::get('/users_no_permission_error', 'PageController@user_no_permission_error');

Route::resource('users_courses', 'UserCourseController', ['only' => ['update', 'destroy']]);
Route::resource('users', 'UserController', ['only' => ['update']]);

Auth::routes();
Route::get('/registry', 'PageController@register')->name('registry');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manage', 'PageController@manage');
Route::get('/users', 'UserController@index');
Route::get('grades', 'PageController@grades');
Route::any('/search',function(){

    //if no user is logged in goes to error page
    if(Auth::guest())
    {
        return view('users_no_permission_error');
    }
    //Checks if user is admin, if it is searches all users with the name condition in search
    if(Auth::User()->getUserType->name === 'Admin' )
    {
        $search = Input::get ( 'search' );
        $usersAdmin = User::where('name','LIKE',$search.'%')->get();
        //if there is at least one user show the user, if not goes to error_page
        if (count($usersAdmin) > 0)
        {
            return view('users')->withDetails($usersAdmin)->withQuery ( $search );
        }
        else return view ('users')->with('usersAdmin',$usersAdmin);

    }
    //Checks if user is teacher, if it is searches all users with the name condition in search and if the users are applied to the course the specific teacher is teaching
    else if(Auth::User()->getUserType->name === 'Teacher')
    {
        $authCourse = Auth::User()->getCourse->id;
        $authId = Auth::User()->id;
        $search = Input::get ( 'search' );

        $usersTeacher = User::where([
            ['name', 'LIKE', $search .'%'],
            ['course_id', '=', $authCourse],
            ['id', '!=', $authId],
        ])->get();

        //if there is at least one user show the user, if not goes to error_page
        if (count($usersTeacher) > 0)
        {
            return view('users')->withDetails($usersTeacher)->withQuery ( $search );
        }
        else return view ('users');
    }
    else return view ('users_no_permission_error');
});
