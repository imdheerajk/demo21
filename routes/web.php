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
    //print '<div style="height: 400px; width: 400px">';
    //print Mapper::render();
   // print '</div>';



});
Route::get('/aboutUs', 'userController@about');


Route::get('/createpost','createPostController@createPost')->middleware('auth');
Route::post('/insertpost','createPostController@insertPost');

Route::post('/insertContactUsMsg' , 'createPostController@insertContactUsMessage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewPost', 'viewPosts@index');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/uploadFile', 'createPostController@uploadfile');
Route::post('/upload', function (){
    //dd(request()->file('myFile'));

    $image = request()->file('myFile');
    $imageFileName = time() . '.' . $image->getClientOriginalExtension();
    $s3 = \Storage::disk('s3');
    $filePath = '/post-files/' . $imageFileName;
    $s3->put($filePath, file_get_contents($image), 'public');
    $url = Storage::url($imageFileName);
    //request()->file('myFile')->store('post-files','s3');

    return redirect('/uploadFile')->with('status', $url);
});

Route::get('/displayS3', 'createPostController@displayS3');