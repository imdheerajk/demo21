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
                    <p>hiiii</p>
                    <div id="map"></div>
                    <script>

                        var map;
                        function initMap() {
                            map = new google.maps.Map(document.getElementById('map'), {
                                center: {lat: -34.397, lng: 150.644},
                                zoom: 8
                            });
                            alert('Hiii33');
                        }
                        alert('hiii1');
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHKsduPMA-9LPTV6tp85EsjwBR0d3Kmt4&callback=initMap"
                            async defer>
                       
                    </script>


            </div>
        </div>
    </div>
@stop

