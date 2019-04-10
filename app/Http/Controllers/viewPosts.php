<?php

namespace MyBlog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MyBlog\PostBlog;
class viewPosts extends Controller
{
    public function index()
    {
        $userid = \Auth::user()->id;
        //$posts = PostBlog::where('user_id', '=', $userid)->get();

        $data = DB::table('post_blogs')
            ->join('users', 'users.id','=','post_blogs.user_id')
            ->select('post_blogs.id', 'post_blogs.subject', 'post_blogs.post', 'post_blogs.img_path', 'post_blogs.created_at', 'post_blogs.updated_at', 'users.name')
            ->where('post_blogs.user_id', '=', $userid)
            ->get();
        return view('viewPost')->with('post',$data);
    }

    public function test()
    {
        return view('testview');
    }
}
