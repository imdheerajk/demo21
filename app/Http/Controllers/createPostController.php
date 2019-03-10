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

        DB::table('post_blogs')->insert(
            ['user_id' => $userid, 'post' => $post]
        );

        echo "Record inserted successfully.<br/>";
        echo '<a href = "/createpost">Click Here</a> to go back.';
    }
}
