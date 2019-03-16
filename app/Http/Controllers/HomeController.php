<?php

namespace MyBlog\Http\Controllers;

use Illuminate\Http\Request;
use MyBlog\PostBlog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid = \Auth::user()->id;
        $posts = PostBlog::all();

        return view('home')->with('post',$posts);
    }
}
