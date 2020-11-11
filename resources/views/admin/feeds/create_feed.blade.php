
@extends('layouts.master')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align:center;"><h1>Create new feed</h1></div>
                    <div class="card-body">
                        <form action="{{url('/admin/save_feed') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-text form-group">
                                <label for="url">Description</label>
                                <input type="text" id="url" name="url" class="form-control" />
                            </div>


                            <div style="clear:both;"></div>

                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                            {{--<input id="createShop-token" name="_token" type="hidden" value="{{csrf_token()}}">--}}
                            <a href="{{ url('admin/feeds') }}" class="btn btn-sm btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create feed</button>
                        </form>
                    </div>
                </div><!--End of row (col-md-10)-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End fluid body container-->

@endsection





