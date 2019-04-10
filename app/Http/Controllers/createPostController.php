<?php

namespace MyBlog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class createPostController extends Controller
{
    //
    public function createPost()
    {

        return view('post');
    }
    public function insertPost(Request $REQUEST)
    {
        $post = $REQUEST->input('createpost');
        $userid = \Auth::user()->id;
        $datetime = date('Y-m-d H:i:s');
        $subject = $REQUEST->input('subject');


        if($REQUEST->has('myFile')){
            //Upload image to AWS S3

            $image = $REQUEST->file('myFile');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();
            $s3 = \Storage::disk('s3');
            $filePath = '/post-files/' . $imageFileName;
            $s3->put($filePath, file_get_contents($image), 'public');

            //Store name to the local database for access
            $image_name = 'https://s3.'.env('AWS_REGION').'.amazonaws.com'.'/'.env('AWS_BUCKET').$filePath;
            DB::table('post_blogs')->insert(
                ['user_id' => $userid, 'post' => $post, 'subject'=>$subject, 'created_at'=>$datetime, 'img_path'=>$image_name]
            );
            return redirect('/home')->with('status', 'Blog posted successfully');
        }
        else
        {
            // cover_image is empty (and not an error)
            DB::table('post_blogs')->insert(
                ['user_id' => $userid, 'post' => $post, 'subject'=>$subject, 'created_at'=>$datetime]
            );
            return redirect('/createpost')->with('status', 'Blog posted successfully');

        }




    }

    public function displayPost()
    {
        $posts = posts::selectRaw("subject, post, created_at")->get();
        $data = [
            'post' => $posts
        ];
        return view('home',$data);
    }

    public function insertContactUsMessage(Request $request)
    {
        $names = $request->input('name');
        $emailid = $request->input('email');
        $msg = $request->input('msg');
        $datetime = date('Y-m-d H:i:s');

        DB::table('contactUs')->insert(
            ['name' => $names, 'email' => $emailid, 'message'=>$msg, 'created_at'=>$datetime]
        );
        return redirect('/contactUs')->with('status', 'Your message sent successfully, Thanks!!!');

    }

    public function uploadfile()
    {
        return view('uploadFile');
    }
    public function displayS3()
    {
        return view('viewFile');
    }

    public function editPost($id)
    {
        $postid =DB::table('post_blogs')->find($id);
        return view('editPost')->with('postid',$postid);

    }

    public function update(Request $request){

        $postid = $request->input('id');
        $post = $request->input('createpost');
        $datetime = date('Y-m-d H:i:s');
        $subject = $request->input('subject');

        if($request->has('myFile'))
        {
            $image = $request->file('myFile');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();
            $s3 = \Storage::disk('s3');
            $filePath = '/post-files/' . $imageFileName;
            $s3->put($filePath, file_get_contents($image), 'public');

            //Store name to the local database for access
            $image_name = 'https://s3.'.env('AWS_REGION').'.amazonaws.com'.'/'.env('AWS_BUCKET').$filePath;

            DB::table('post_blogs')
                ->where('id', $postid)
                ->update(['post' => $post, 'subject'=>$subject, 'updated_at'=>$datetime, 'img_path'=>$image_name]);
        }
        else
        {
            DB::table('post_blogs')
                ->where('id', $postid)
                ->update(['post' => $post, 'subject'=>$subject, 'updated_at'=>$datetime]);
        }
        return redirect('/viewPost')->with('status', 'Post Updated successfully');


    }
}
