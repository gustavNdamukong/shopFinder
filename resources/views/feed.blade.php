<?php

?>

@extends('layouts.master')


    @section('content')



    <div class="container">

        <div class="jumbotron" id="map-canvas"></div>

        <div class="jumbotron" id="directions-canvas"></div>


        <div class="jumbotron">

            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1 style="text-align: center;">Your RSS Feeds</h1></div>
                        <div class="panel-body">
                            @if($feeds)
                            @for($x = 0; $x < count($feeds); $x++)
                            <a href="{{ url('feed_details/'.$feeds[$x]->id) }}">
                                <div class="shop">
                                    <div class="shop_info">
                                        <div class="description">
                                            @if(@simplexml_load_file($feeds[$x]->url))
                                                {{$feed = simplexml_load_file($feeds[$x]->url)}}
                                            @else
                                                {{$invalidurl = true}}
                                                {{"<h2>Invalid RSS Feed URL.</h2>"}}
                                            @endif

                                            @if(!empty($feed))
                                                {{$title = $feed->channel->title}}
                                                <h4>Number of stories: {{count($feed->channel->item)}}</h4>
                                            @else
                                                @if(!$invalidurl)
                                                    {{ "<h2>You have no feeds yet</h2>" }}
                                                @endif
                                            @endif

                                        </div>
                                    </div><!--End class 'shop_info'-->
                                </div><!--End class 'shop'-->
                            </a>

                            <hr class="separate">
                            @endfor

                            <div class='nav-links'>
                                {!! $feeds->render() !!}
                            </div>
                            @else
                                <h2>You must be logged in to view your feeds</h2>
                            @endif
                            @if((!is_array($feeds)) && ($feeds->toArray()['total'] === 0))
                                <h2>You don't have any feeds yet</h2>
                                    <li><a href="{{ url('admin/create_feed') }}">Create new Feed</a></li>
                            @endif
                        </div><!--End panel body-->
                    </div><!--End panel panel-default-->
                </div><!--End of row (col-md-10)-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End fluid body container-->
    @endsection

