<?php
/**
 * Created by PhpStorm.
 * User: dheerajk
 * Date: 2019-04-02
 * Time: 11:22
 */
?>


@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload file to AWS S3

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="/upload" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="myFile" class="col-md-4 col-form-label text-md-right">Upload File</label>

                            <input type="file" name="myFile" class="form-inline">
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
        </div>
    </div>
</div>
@endsection
