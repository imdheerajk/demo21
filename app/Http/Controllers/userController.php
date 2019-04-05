<?php

namespace MyBlog\Http\Controllers;

use Illuminate\Http\Request;
use MyBlog\User;
use Illuminate\Support\Facades\DB;
class userController extends Controller
{
    public function contact(){
        return view('contactUs');
    }

    public function about()
    {

        return view('aboutUs');
    }

    public function profile()
    {

        $userid = \Auth::user()->id;
        $data = DB::table('users')->where('id', '=', $userid)->first();

        return view('profile')->with('data',$data);
    }
    public function updatedp(Request $request)
    {

        $userid = \Auth::user()->id;
        $image = $request->file('myFile');

        $imageFileName = time() . '.' . $image->getClientOriginalExtension();
        $s3 = \Storage::disk('s3');
        $filePath = '/post-files/' . $imageFileName;
        $s3->put($filePath, file_get_contents($image), 'public');

        //Store name to the local database for access
        $image_name = 'https://s3.'.env('AWS_REGION').'.amazonaws.com'.'/'.env('AWS_BUCKET').$filePath;




        DB::table('users')
            ->where('id', $userid)
            ->update(['profile_pic' => $image_name]);

        return redirect('/profile')->with('status', 'Profile Picture updated successfully');
    }




}
