<?php

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
Route::get('/contact', 'PageController@contacts');

Auth::routes();

Route::get('/register',function(){

    $user_type = \App\UserType::all();
    $schooling = \App\Schooling::all();

    return view('auth.register')->with('user_types', $user_type)->with('schooling', $schooling);

})->name('register');

Route::get('/home', 'HomeController@index')->name('home');
