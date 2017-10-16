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
/*Routes created by laravel*/
Auth::routes();

/*PageController routes*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PageController@home');
Route::get('/news', 'PageController@news');
Route::get('/about', 'PageController@about');
Route::get('/admin', 'PageController@admin');
Route::get('/contacts', 'PageController@contacts');
Route::get('/registry', 'PageController@register')->name('registry');
Route::get('/manage', 'PageController@manage');
Route::get('/users_no_permission_error', 'PageController@user_no_permission_error');

/*Resource routes for list/create/update/delete*/
Route::resource('users_courses', 'UserCourseController', ['only' => ['update','edit']]);
Route::resource('grades', 'UserGradeController', ['only' => ['index','store','update','destroy']]);
Route::resource('users', 'UserController', ['only' => ['index','create','store','update','edit','destroy']]);
Route::resource('courses', 'CourseController', ['only' => ['index','create','store','update','edit','destroy']]);

/*Route for searching functionality*/
Route::any('/search',function(){

    //if no user is logged in goes to error page
    if(Auth::guest())
    {
        return view('users_no_permission_error');
    }
    //Checks if user is admin, if it is searches all users with the name condition in search
    if(Auth::User()->user_type === 3 )
    {
        $search = Input::get ( 'search' );

        /*gets all users from database that has the name started by what admin typed in search bar*/
        $usersAdmin = User::where([['name','LIKE',$search.'%'],['status','=',true]])->get();
        //if there is at least one user to show
        if (count($usersAdmin) > 0)
        {
            return view('users')->withDetails($usersAdmin)->withQuery ( $search );
        }
        else return view ('users')->with('usersAdmin',$usersAdmin);

    }
    //Checks if user is teacher
    else if(Auth::User()->user_type === 2)
    {
        $authCourse = Auth::User()->getCourse->id;
        $authId = Auth::User()->id;
        $search = Input::get ( 'search' );

        /*gets all users from database that are applied to the same course as the logged on teacher is teaching and has the name started by what teacher typed in search bar*/
        $usersTeacher = User::where([
            ['name', 'LIKE', $search .'%'],
            ['course_id', '=', $authCourse],
            ['id', '!=', $authId],
            ['status','=',true]
        ])->get();

        //if there is at least one user show the user
        if (count($usersTeacher) > 0)
        {
            return view('users')->withDetails($usersTeacher)->withQuery ( $search );
        }
        else return view ('users')->with('usersTeacher', $usersTeacher);
    }
    else
    {
        return view ('users_no_permission_error');
    }
});
