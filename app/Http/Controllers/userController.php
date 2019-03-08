<?php

namespace MyBlog\Http\Controllers;

use Illuminate\Http\Request;
use MyBlog\User;
class userController extends Controller
{
    public function contact(){
        $users = [
            '0' => [
                'first_name'=>'ABC',
                'last_name'=>'CBA',
                'location'=>'Regina'
            ],
        '1' => [
            'first_name'=>'XYZ',
            'last_name'=>'ZXY',
            'location'=>'Calgary'
        ]
        ];
        $name = "DHEERAJ";
        return view('admin.contact', compact('name'));
    }

    public function alluser()
    {
        $name = "DHEERAJ";
        return view('admin.contact', compact('name'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return "SUCCESS";
        return $request->all();
    }
}
