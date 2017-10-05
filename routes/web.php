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
Route::get('/admin', 'PageController@contacts');
Route::get('/contacts', 'PageController@contacts');

Route::resource('users', 'UserCourseController', ['only' => ['update']]);

Auth::routes();
Route::get('/registry', 'PageController@register')->name('registry');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manage', 'PageController@manage');
