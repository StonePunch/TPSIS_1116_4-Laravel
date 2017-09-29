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
Route::get('/courses', 'PageController@courses');
Route::get('/news', 'PageController@news');
Route::get('/about', 'PageController@about');
<<<<<<< HEAD
Route::get('/contact', 'PageController@contacts');
Route::get('/admin', 'PageController@contacts');
=======
Route::get('/contacts', 'PageController@contacts');

>>>>>>> 59db19468363d56795b667e211c243a7da481d20

Auth::routes();

Route::get('/register', 'PageController@register');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manage', 'PageController@manage');
