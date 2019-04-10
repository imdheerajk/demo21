<?php
/**
 * Created by PhpStorm.
 * User: dheerajk
 * Date: 2019-04-04
 * Time: 17:26
 */
?>
@extends('layouts.app')
@section('content')

                <div class="card-header">User Profile</div>
                <div class="card-body">
                   Name:  <b>{{$data->name}}</b><br/>
                   Email:  <b>{{$data->email}}</b> <br/>


                    <hr/> <center><img src='{{ $data->profile_pic }}' height="300px" width="300px" style="border-radius: 50%"/></center><br/>
                    <form method="post" action="/updatedp" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="myFile" class="col-md-4 col-form-label text-md-right">Update Profile Photo</label>

                            <input type="file" name="myFile" class="col-md-4 form-control" accept="image/*" required>
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

@stop

