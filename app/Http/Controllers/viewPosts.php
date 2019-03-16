<?php

namespace MyBlog\Http\Controllers;

use Illuminate\Http\Request;
use MyBlog\PostBlog;
class viewPosts extends Controller
{
    public function index()
    {
        $userid = \Auth::user()->id;
        $posts = PostBlog::where('user_id', '=', $userid)->get();

        return view('viewPost')->with('post',$posts);
    }
}
