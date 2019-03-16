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
        DB::table('post_blogs')->insert(
            ['user_id' => $userid, 'post' => $post, 'subject'=>$subject, 'created_at'=>$datetime]
        );
        return redirect('/home')->with('status', 'Blog posted successfully');

    }

    public function displayPost()
    {
        $posts = posts::selectRaw("subject, post, created_at")->get();
        $data = [
            'post' => $posts
        ];
        return view('home',$data);
    }
}
