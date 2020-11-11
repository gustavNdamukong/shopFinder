
@extends('layouts.master')

@section('content')


    <style>
        ul .lon, ul .lat, ul .address, ul .postcode, ul .location
        {

        }

    </style>


    <div class="container">

        <h2 style="text-align: center;">Manage Feeds</h2>


        <div class="jumbotron" id="map-canvas"></div>

        <div class="jumbotron" id="directions-canvas"></div>


        <div class="jumbotron">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>List of your feeds</h4>
                            <a href="{{ url('admin/create_feed') }}">
                                <button class="btn btn-sm btn-default">Create new feed</button>
                            </a>
                        </div>
                        <div class="panel-body">
                            <p>Showing {!! $feeds->firstItem() !!} to {{ $feeds->lastItem() }} of {{ $feeds->total() }} feeds</p>
                            @if(count($feeds) > 0)
                            @for($x = 0; $x < count($feeds); $x++)
                            <!--<a href="{{ url('feed_details/'.$feeds[$x]->id) }}">-->
                                <div class="shop">
                                    {{--<div class='img_container'>
                                        <div class="image">
                                            <img src="{{ empty($shops[$x]->shop_image->pluck('image_name')[0]) ?
                                                url('images/store_imgs/1.png') :
                                                url('images/store_imgs/'.$shops[$x]->shop_image->pluck('image_name')[0]) }}" />
                                        </div>
                                    </div>--}}
                                    <div class="shop_info">
                                        <div class="description">{{ $feeds[$x]->url }}</div>
                                    </div><!--End class 'shop_info'-->
                                </div><!--End class 'shop'-->
                            <div style="margin-top:5px;">
                                <form action="{{ url("admin/feeds/{$feeds[$x]->id}")}}" method="POST" id="delete_feed_form{{$x}}">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button  name="{{$feeds[$x]->url}}" id="{{$x}}" style="height:30px;" type="submit" class="btn btn-sm btn-danger float-left delete_feed">Delete</button>
                                </form>
                            </div>

                            <!--</a>-->
                            <br />
                            <hr class="separate">
                            @endfor
                            @else
                                <p>You have not created any feeds yet</p>
                            @endif

                            <div class='nav-links'>
                                {!! $feeds->render() !!}
                            </div>

                        </div><!--End panel body-->
                    </div><!--End panel panel-default-->
                </div><!--End of row (col-md-10)-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End fluid body container-->
    @endsection

    @section('rawJS')
    <script type="text/javascript">

        $(document).on('click', '.delete_feed', function(e) {
            e.preventDefault();
            let btnId = this.id;

            let form = $('#delete_feed_form'+btnId);

            //Confirm if they really want to delete the img
            let conf = confirm('Are you sure you want to delete this feed');
            if (conf == false) {
                return false;
            }
            else {
                form.submit();
            }
        });

    </script>
    @endsection

