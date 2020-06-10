<?php

?>

@extends('layouts.master')


    @section('content')



    <div class="container">

        <h2 style="text-align: center;">Welcome to the Shop Finder app</h2>


        <div class="jumbotron" id="map-canvas"></div>

        <div class="jumbotron" id="directions-canvas"></div>


        <div class="jumbotron">

            <p>Geolocation</p>
            <div class="well" id="geoLocation">
                <small>Make sure you have location services turned on in your device. If it doesn't work at first, refresh the page and try again...</small>
            </div>


            <div id="buttons">
                <button class="btn btn-primary" id="getGeolocation">Get your geolocation</button>
                <button class="btn btn-primary" id="getYourSpot">Get your spot on the map</button>
                <button title="Make sure you have location services turned on in your device" class="btn btn-primary" id="getDirections">Get directions to nearest shop</button>
            </div>

            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Our list of awesome shop branches</h4></div>
                        <div class="panel-body">
                            <p>Showing {!! $shops->firstItem() !!} to {{ $shops->lastItem() }} of {{ $shops->total() }} shops</p>

                            @for($x = 0; $x < count($shops); $x++)
                            <a href="{{ url('store_details/'.$shops[$x]->id) }}">
                                <div class="shop">
                                    <div class='img_container'>
                                        <div class="image">
                                            <img src="{{ empty($shops[$x]->shop_image->pluck('image_name')[0]) ?
                                                asset('images/store_imgs/1.png') :
                                                asset('images/store_imgs/'.$shops[$x]->shop_image->pluck('image_name')[0]) }}" />
                                        </div>
                                    </div>
                                    <div class="shop_info">
                                        <div class="name">{{ $shops[$x]->name }}</div>
                                        <div class="description">{{ $shops[$x]->description }}</div>
                                        <div class="location">{{ $shops[$x]->location }}</div>
                                        <div class="postcode">{{ $shops[$x]->postcode }}</div>
                                        <div class="address">{{ $shops[$x]->address }}</div>
                                    </div><!--End class 'shop_info'-->
                                </div><!--End class 'shop'-->
                            </a>
                            <a href="#">
                                <span id="favBtn" onclick="alert('Add to favourites feature coming soon :)')" style="font-size: 30px;color:gold;" class="glyphicon glyphicon-heart pull-right" title="Add to your favourites"></span>
                            </a>
                            <br />
                            <hr class="separate">
                            @endfor

                            <div class='nav-links'>
                                {!! $shops->render() !!}
                            </div>

                        </div><!--End panel body-->
                    </div><!--End panel panel-default-->
                </div><!--End of row (col-md-10)-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End fluid body container-->
    @endsection

