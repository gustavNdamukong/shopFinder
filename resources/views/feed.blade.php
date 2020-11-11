<?php

?>

@extends('layouts.master')


    @section('content')



    <div class="container">

        <h2 style="text-align: center;">Welcome to the Shop Finder app</h2>


        <div class="jumbotron" id="map-canvas"></div>

        <div class="jumbotron" id="directions-canvas"></div>


        <div class="jumbotron">

            <p>Feeds</p>

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
                                        {{--<div class="image">
                                            <img src="{{ empty($shops[$x]->shop_image->pluck('image_name')[0]) ?
                                                asset('images/store_imgs/1.png') :
                                                asset('images/store_imgs/'.$shops[$x]->shop_image->pluck('image_name')[0]) }}" />
                                        </div> --}}
                                    </div>
                                    <div class="shop_info">
                                        <div class="description">{{ $shops[$x]->url }}</div>
                                    </div><!--End class 'shop_info'-->
                                </div><!--End class 'shop'-->
                            </a>

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

