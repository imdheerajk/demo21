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
                    <div class="card-header">New Post

                    </div>

                    <div class="card-body">
                        <div class="card-title">
                            Your Posts
                        </div>
                        @foreach ($post as $val)
                            <div class="card-header">{{$val->subject}}</div>
                            <div class="card-body">{{$val->post}}</div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


