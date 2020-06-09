<?php

$imgNum = 0;
// define number of imgs per carousel slide
define('IMGS_PER_SLIDE', 4);
// initialize a counter variable for the image loop
$imgsCount = count($shopImages);

    ?>

{{-- @extends('layouts.shopFinderLayout') --}}
@extends('layouts.master')


@section('content')

        <div class="container">
    
        <h4 style="text-align: center;"><a href="{{ route('home') }}" class="btn btn-sm btn-primary pull-left"  role="button">Back</a> Welcome to {{ $shop->pluck('name')->first() }} shop</h4>


        <div class="jumbotron">
            <div class="row">
                <div class="shop">
                    <div class='detail_img_container'>
                        <div class="image">
                            {{-- Does the shop have an img? --}}
                            @if(count($shopImages))
                                {{-- If so, are the imgs more than 1? --}}
                                @if($imgsCount > 1)
                                    {{-- there is more than one assoc img, so show the first one --}}
                                    <img src="{{ asset('images/store_imgs/'.$shopImages[$imgNum]) }}" />
                                    {{-- For the rest of the images, show a thumbnail slider --}}
                                    <div class="clearfix">
                                        <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    @foreach ($shopImages as $image)
                                                    <div data-target="#carousel" data-slide-to="{{ $imgNum }}" class="thumb col-sm-3">
                                                        <!--######## click on the thumbs n view them bigger in a cool BS img gallery##################-->
                                                        <a href="{{ asset('images/store_imgs/'.$image)}}"
                                                           class='thumbnail img-responsive' data-gallery>
                                                            <img src="{{ asset('images/store_imgs/'.$image)}}"
                                                                 width='100' height='100'
                                                                 style="overflow:hidden;"/>
                                                        </a>
                                                    </div>
                                                    <?php //increment the count of imgs on the slide
                                                    $imgNum++; ?>

                                                    {{-- if remainder is 0, we've attained the max num of imgs per slide, so close div (slide) and start new one. Using modulus means your slide
                                                    can take an infinite num of imgs with 4 per slide per shop image. However, we also ONLY allow the slider to slide on click to the next set if
                                                    the max num of images has NOT been reached. --}}
                                                    @if (($imgNum % IMGS_PER_SLIDE === 0) && ($imgNum < $imgsCount))
                                                </div><!--end the 'item active' div wh contains the max number of visible images per slide. Clicking the arrow will move to the next slide
                                                    So if we've displayed the max num of img in the slide, we close the slide (item active) div here and open another one wh has no active class.
                                                    Only the slide (div) with the active class will be displayed at any one time. Clicking to move to the next slide will transfer the 'active'
                                                    class to the next div (slide) which will make that next div become visible (active).-->
                                                        <!-- start the item div -->
                                                <div class="item">
                                                    @endif
                                                    @endforeach {{-- end of the foreach loop --}}
                                                </div><!--This could be the end of either the div with the 'item' class or the 'item active' div. Note this is b/c if the total imgs were more
                                                    than the max num required to be displayed in one slide (as checked for in the if statement above), this closing div will be closing the
                                                    'item' div that would have been started, otherwise it will be closing the 'item active' div that was started to contain the thumbnail imgs.
                                                    Remember that whether the 'item' div was started or not, the loop above will insert the 'thumb' divs (imgs) into which ever div is open. -->
                                            </div><!-- / end carousel-inner -->
                                            <a class="left carousel-control" href="#thumbcarousel" role="button"
                                               data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#thumbcarousel" role="button"
                                               data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div> <!-- /thumbcarousel-->
                                    </div><!-- /clearfix -->

                                @elseif($imgsCount === 1) {{-- Else if there's only one img, show it --}}
                                    <img src="{{ asset('images/store_imgs/'.$shopImages[0]) }}" />
                                @endif {{-- end of check if there's only one image --}}
                            @elseif($imgsCount < 1) {{-- if there is no image at all --}}
                                <img src="{{ asset('images/store_imgs/1.png') }}" />
                            @endif {{-- end of check if there are any images at all --}}
                        </div>
                    </div>
                    <div class="shop_info">
                        <div class="name"><p><b>Name:</b> {{ $shop->pluck('name')[0] }}</p></div>
                        <div class="location"><b>Location:</b>  {{ $shop->pluck('city')[0] }}</div>
                        <div class="address"><b>Address:</b><br />  {{ $shop->pluck('address')[0] }}</div>
                    </div><!--End class 'resto_info'-->
                    <div class="description">
                        <b>Description:</b>
                        {{ $shop->pluck('description')[0] }}

                    <a href="#">
                        <span id="favBtn" onclick="alert('Add to favourites feature coming soon :)')" style="font-size: 50px;color:gold;" class="glyphicon glyphicon-heart pull-right" title="Add to your favourites"></span>
                    </a>
                    </div>

                </div><!--End class 'resto'-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End of (body) container-->

    @endsection





