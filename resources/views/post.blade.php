<?php
/**
 * Created by PhpStorm.
 * User: dheerajk
 * Date: 2019-03-07
 * Time: 22:48
*/
?>

@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">New Post

        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" action="/insertpost" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Subject</label>

                    <div class="col-md-6">
                        <input type="text" name="subject" id="subject" class="form-control" required maxlength="80"
                               minlength="10">
                    </div>
                    <br/>
                </div>
                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label text-md-right">Create Post</label>

                    <div class="col-md-6">
                        <textarea rows="11" maxlength="500" class="form-control" id="createpost" name="createpost"
                                  required placeholder="Enter your text here..."></textarea>

                    </div>
                    <br/>

                </div>
                <div class="form-group row">
                    <label for="myFile" class="col-md-4 col-form-label text-md-right">Upload File</label>

                    <input type="file" name="myFile" class="col-md-4 form-control" accept="image/*">
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

