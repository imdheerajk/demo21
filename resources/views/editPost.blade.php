<?php
/**
 * Created by PhpStorm.
 * User: dheerajk
 * Date: 2019-04-09
 * Time: 16:18
 */
?>
@extends('layouts.app')
@section('content')
    <?php
    if($postid->user_id == Auth::user()->id)
        {


?>

    <div class="card-header">Edit Post
        <div class="card-body">

            {!! Form::open(['url' => '/editPost', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group row">
                <label for="text" class="col-md-4 col-form-label text-md-right">Subject</label>

                <div class="col-md-6">
                    <input type="hidden" name="id" value="{{$postid->id}}"/>
                    <input type="text" name="subject" id="subject" value="{{$postid->subject}}" class="form-control"
                           required maxlength="80"
                           minlength="10">
                </div>
                <br/>
            </div>
            <div class="form-group row">
                <label for="text" class="col-md-4 col-form-label text-md-right">Create Post</label>

                <div class="col-md-6">
                        <textarea rows="11" maxlength="500" class="form-control" id="createpost" name="createpost"
                                  required placeholder="Enter your text here...">{{$postid->post}}</textarea>

                </div>
                <br/>

            </div>
            <?php
            if($postid->img_path != '')
            {
            ?>
            <center><img src='{{ $postid->img_path }}' height="300px" width="300px" style="border-radius: 20%"/>
                <?php
                }
                ?>
            </center>
            <br/>
            <div class="form-group row">


                <label for="myFile" class="col-md-4 col-form-label text-md-right">Upload New File</label>
                <input type="file" name="myFile" class="col-md-4 form-control" accept="image/*">
            </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>

                </div>
            </div>


            {!! Form::close() !!}

        </div>


    </div>



<?php
        }
    else
        {
            return redirect('/viewPost')->with('status', 'Not authorized to edit this blog');
        }

?>

@endsection
