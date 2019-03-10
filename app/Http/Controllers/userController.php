<?php

namespace MyBlog\Http\Controllers;

use Illuminate\Http\Request;
use MyBlog\User;
class userController extends Controller
{
    public function contact(){
        return view('contactUs');
    }

    public function about()
    {

        return view('aboutUs');
    }




}
