<?php
/**
 * Created by PhpStorm.
 * User: dheerajk
 * Date: 2019-03-15
 * Time: 19:15
 */?>

@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

@section('content')

    <div class="card-header">Your Posts

    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @foreach ($post as $val)
            <div class="card-header" style="background: #a1cbef">{{$val->subject}}
                <hr/>
                <font size="2 px">Posted at:
                    <b>{{date('F j, Y', strtotime($val->created_at))}}</b>
                    By:&nbsp&nbsp{{$val->name}}
                </font>
                <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                    <a href="/editPost/{{$val->id}}"
                       class="btn btn-secondary"><i class="fa fa-pencil">&nbsp;Edit</i></a>
                </div>
            </div>
            <div class="card-body">{{$val->post}}
                <?php
                if ($val->img_path) {
                    echo '<hr/> <center><img src="' . $val->img_path . '" height="300px" width="300px" ></center>';
                }

                ?>

            </div>
        @endforeach

    </div>

@endsection


