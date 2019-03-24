<?php
/**
 * Created by PhpStorm.
 * User: dheerajk
 * Date: 2019-03-09
 * Time: 16:59
 */?>




@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">Contact Us</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="/insertContactUsMsg">
                        @csrf
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" required />
                            </div><br/>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control" required >
                            </div><br/>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Message</label>

                            <div class="col-md-6">
                                <textarea rows="7" maxlength="500"  class="form-control" id="msg" name="msg" required placeholder="Enter your text here..."></textarea>

                            </div><br/>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                            </div>
                        </div>
                    </form>



                    <div style="height: 400px; width: 700px">{!! Mapper::render() !!}</div>


                </div>
            </div>
        </div>
    </div>
@stop

