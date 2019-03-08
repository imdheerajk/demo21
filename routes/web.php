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

Route::get('/', function () {

    return view('welcome');
});
Route::get('/contactus', 'userController@contact');
Route::get('/alluser', 'userController@alluser');
Route::get('/create', 'userController@create');
Route::post('/alluser', 'userController@store');

Route::resource('/post','userController@createPost');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
