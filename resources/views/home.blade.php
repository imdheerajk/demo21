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
