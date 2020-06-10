
@extends('layouts.master')

@section('content')


    <style>
        ul .lon, ul .lat, ul .address, ul .postcode, ul .location
        {

        }

    </style>


    <div class="container">

        <h2 style="text-align: center;">Manage Shops</h2>


        <div class="jumbotron" id="map-canvas"></div>

        <div class="jumbotron" id="directions-canvas"></div>


        <?php //LET'S CREATE THE LOADING GIF THAT WILL BE PLACED IN THE JUMBOTRON WHEN AN AJAX CALL IS BEING MADE ?>
        <div class="loading_gif" style="display: none;">
            <img src="{{ asset('images/loading_blue.gif') }}" width="65" height="65" />
        </div>

        <div class="jumbotron">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>List of your shops</h4>
                            <a href="{{ url('admin/create_shop') }}">
                                <button class="btn btn-sm btn-default">Create new shop</button>
                            </a>
                        </div>
                        <div class="panel-body">
                            <p>Showing {!! $shops->firstItem() !!} to {{ $shops->lastItem() }} of {{ $shops->total() }} shops</p>
                            @if(count($shops) > 0)
                            @for($x = 0; $x < count($shops); $x++)
                            <!--<a href="{{ url('store_details/'.$shops[$x]->id) }}">-->
                                <div class="shop">
                                    <div class='img_container'>
                                        <div class="image">
                                            <img src="{{ empty($shops[$x]->shop_image->pluck('image_name')[0]) ?
                                                url('images/store_imgs/1.png') :
                                                url('images/store_imgs/'.$shops[$x]->shop_image->pluck('image_name')[0]) }}" />
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
                            <div style="margin-top:5px;">
                                <a href="edit_shop/<?=$shops[$x]->id?>">
                                    <button type="button" style="height:30px;" class="btn btn-primary float-left">Edit</button>
                                </a>
                                    {{--<a href="{{ url("/admin/edit_shop/{$shops[$x]->id}/") }}">--}}
                                <form action="{{ url("admin/shops/{$shops[$x]->id}")}}" method="POST" id="delete_shop_form{{$x}}">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button  name="{{$shops[$x]->name}}" id="{{$x}}" style="height:30px;" type="submit" class="btn btn-sm btn-danger float-left delete_shop">Delete</button>
                                </form>
                            </div>

                            <!--</a>-->
                            <br />
                            <hr class="separate">
                            @endfor
                            @else
                                <p>You have not created any shops yet</p>
                            @endif

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

    @section('rawJS')
    <script type="text/javascript">

        $(document).on('click', '.delete_shop', function(e) {
            e.preventDefault();
            let btnId = this.id;

            let form = $('#delete_shop_form'+btnId);

            //Confirm if they really want to delete the img
            let conf = confirm('Are you sure you want to delete this shop');
            if (conf == false) {
                return false;
            }
            else {
                form.submit();
            }
        });

    </script>
    @endsection

