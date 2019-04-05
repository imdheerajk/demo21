<?php

namespace MyBlog\Http\Controllers;

use Illuminate\Http\Request;
use MyBlog\PostBlog;
use Illuminate\Support\Facades\DB;

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
        //$userid = \Auth::user()->id;

        //SELECT p.subject, p.post, p.img_path, p.created_at, p.updated_at, u.name FROM `post_blogs` p INNER join users u WHERE p.user_id = u.id
        $data = DB::table('post_blogs')
            ->join('users', 'users.id','=','post_blogs.user_id')
            ->select('post_blogs.subject', 'post_blogs.post', 'post_blogs.img_path', 'post_blogs.created_at', 'post_blogs.updated_at', 'users.name')
            ->get();

        return view('home')->with('post',$data);
    }
}
