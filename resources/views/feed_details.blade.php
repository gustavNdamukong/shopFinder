
@extends('layouts.master')


@section('content')

        <div class="container">
    
        <h4 style="text-align: center;"><a href="{{ route('home') }}" class="btn btn-sm btn-primary pull-left"  role="button">Back</a> Viewing {{ $feed->pluck('title')->first() }} </h4>


        <div class="jumbotron">
            <div class="row">
                <div class="shop">

                    <div class="shop_info">
                        <div class="name"><p><b>URL:</b> {{ $feed->toArray()[0]['url'] }}</p></div>
                        {{--<div class="location"><b>Location:</b>  {{ $shop->pluck('city')[0] }}</div>
                        <div class="address"><b>Address:</b><br />  {{ $shop->pluck('address')[0] }}</div>--}}
                    </div><!--End class 'resto_info'-->
                    <div class="description">
                        {{-- $shop->pluck('description')[0] --}}

                        {{--//---------------------------}}


                        {{--dd($feed->toArray()[0]['url'])--}}

                        @if(@simplexml_load_file($feed->toArray()[0]['url']))
                            {{$feed = simplexml_load_file($feed->toArray()[0]['url'])}}
                        @else
                            {{$invalidurl = true}}
                            {{"<h2>Invalid RSS Feed URL.</h2>"}}
                        @endif

                        {{--$i = 0--}}
                        @if(!empty($feed))
                            {{--'<pre>'.print_r($feed)--}}


                            <b>Title:</b>
                            <a class="feed-title" href="{{$feed->channel->link}}"><h2>{{$title = $feed->channel->title}}</h2></a>

                            @foreach($feed->channel->item as $item)
                                {{-- $site = $tem->url --}}
                                {{--dd('THIS IS THE TITLE: '.$site.'THIS IS THE URL: '.$feeds[$x]->url.' '.$sitelink)--}}
                                {{-- $link = $tem->link --}}
                                {{ $description = $item->description }}
                                {{ $postDate = $item->pubDate }}
                                {{ $pubDate= date('D, d M Y', strtotime($postDate)) }}

                                {{--@if($i >= 5)
                                    break
                                @endif--}}


                                <div class="post">
                                    <div class="post-head">
                                        <h2>

                                        </h2>Published: <span>{{ $pubDate }}</span>
                                    </div>

                                    <div class="post-content">
                                        {{ implode(" ", array_slice(explode(' ', $description), 0, 20)) }}
                                    </div>
                                </div>

                                {{--$i++ --}}
                            @endforeach
                        @else
                            @if(!$invalidurl)
                                {{ "<h2>No item found</h2>" }}
                            @endif
                        @endif



                    <a href="#">
                        <span id="favBtn" onclick="alert('Add to favourites feature coming soon :)')" style="font-size: 50px;color:gold;" class="glyphicon glyphicon-heart pull-right" title="Add to your favourites"></span>
                    </a>
                    </div>

                </div><!--End class 'resto'-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End of (body) container-->

    @endsection





