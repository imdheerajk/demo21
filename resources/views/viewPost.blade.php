<?php
/**
 * Created by PhpStorm.
 * User: dheerajk
 * Date: 2019-03-15
 * Time: 19:15
 */?>

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Posts

                    </div>

                    <div class="card-body">

                        @foreach ($post as $val)
                            <div class="card-header" style="background: #a1cbef">{{$val->subject}}
                            <hr/><font size="2 px">Posted at:
                                <b>{{date('F j, Y', strtotime($val->created_at))}}</b>
                                By:&nbsp&nbsp{{$val->name}}
                            </font> </div>
                            <div class="card-body" >{{$val->post}}
                                <?php
                                if($val->img_path)
                                {
                                    echo '<hr/> <center><img src="'.$val->img_path.'" height="300px" width="300px" ></center>';
                                }

                                ?>

                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection


