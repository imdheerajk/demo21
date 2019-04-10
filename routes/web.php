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

use Cornford\Googlmapper\Facades\MapperFacade;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});
Route::get('/contactUs', function(){
    Mapper::map(
        50.447478,
        -104.618253,
        [
            'zoom' => 12,
            'draggable' => true,
            'marker' => false,

        ]
    );

    return view('contactUs');




});
Route::get('/aboutUs', 'userController@about');
Route::get('/profile', 'userController@profile');

Route::get('/createpost','createPostController@createPost')->middleware('auth');
Route::post('/insertpost','createPostController@insertPost');
Route::post('/updatedp','userController@updatedp');

Route::post('/insertContactUsMsg' , 'createPostController@insertContactUsMessage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewPost', 'viewPosts@index');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/testTemplate', 'viewPosts@test');


//EDIT POSTS

Route::get('editPost/{param1}', [
    'uses'  => 'createPostController@editPost',
    'as'    => 'editPost'
]);
Route::post('editPost', 'createPostController@update');