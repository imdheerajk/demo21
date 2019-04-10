@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

@section('content')

    <div class="card-header">Dashboard

    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-title">
            <h3>Popular Posts</h3>
        </div>
        @foreach ($post as $val)
            <div class="card-header">
                <div class="card-header" style="background: #a1cbef"><font size="4 px">{{$val->subject}} </font>
                    <br/>
                    <font size="2 px">Posted at:
                        <b>{{date('F j, Y', strtotime($val->created_at))}}</b>
                        By:&nbsp&nbsp{{$val->name}}
                    </font>


                </div>
                <div class="card-body">{{$val->post}}
                    <?php
                    if ($val->img_path) {
                        echo '<hr/> <center><img src="' . $val->img_path . '" height="300px" width="300px" ></center>';
                    }

                    ?>


                </div>
                <div class="card-header" >
Actions
                    <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                @if($val->user_id == Auth::user()->id)

                        <a href="/editPost/{{$val->id}}"
                           class="btn btn-secondary"><i class="fa fa-pencil">&nbsp;Edit</i></a>



                @endif
                    </div>
                </div>
            </div>
            <br/>
        @endforeach


    </div>

@endsection
