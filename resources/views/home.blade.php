@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                        <div class="card-header">{{$val->subject}}</div>
                        <div class="card-body">{{$val->post}}
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
</div>
@endsection
