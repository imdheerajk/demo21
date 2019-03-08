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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Post

                    </div>

                    <div class="card-body">
                        <form method="post" action=" {{ route('createpost') }} ">
                            @csrf
                            <div class="form-group row">
                                <label for="text" class="col-md-4 col-form-label text-md-right">Create Post</label>

                                <div class="col-md-6">
                                    <textarea id="createpost" name="createpost" required placeholder="Enter your text here..."></textarea>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create Post') }}
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
