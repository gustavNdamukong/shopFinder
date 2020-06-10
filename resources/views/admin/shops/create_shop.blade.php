
@extends('layouts.master')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align:center;"><h1>Create new shop</h1></div>
                    <div class="card-body">
                        <form action="{{url('/admin/save_shop') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-text form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class="form-control" />
                            </div>


                            <div class="form-text form-group">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control"></textarea>
                            </div>
                            <button id="findCoords" class="btn btn-sm btn-success">Find the address coordinates</button>


                            <div class="form-text form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>


                            <div class="form-text form-group">
                                <label for="postcode">Postcode</label>
                                <input type="text" id="postcode" name="postcode" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="lat">Latitude</label>
                                <input type="text" id="lat" name="lat" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="lon">Longitude</label>
                                <input type="text" id="lon" name="lon" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="addImgBtn">Images - (<small>Optional</small>)</label>
                                <br />
                                <td><button id="addImgBtn" onclick="showImgUpload(event)" class="btn btn-xs btn-warning">Add images</button>
                            </div>
                            <div style="clear:both;"></div>


                            <div id="uploadImages" style="display:none;">
                                <h4>You may upload up to 5 images per shop</h4>
                                <input type="file" id="fileUpload1" name="fileUpload[]" />
                                <input type="file" id="fileUpload2" name="fileUpload[]" />
                                <input type="file" id="fileUpload3" name="fileUpload[]" />
                                <input type="file" id="fileUpload4" name="fileUpload[]" />
                                <input type="file" id="fileUpload5" name="fileUpload[]" />
                            </div>

                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                            {{--<input id="createShop-token" name="_token" type="hidden" value="{{csrf_token()}}">--}}
                            <a href="{{ url('admin/shops') }}" class="btn btn-sm btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create shop</button>
                        </form>
                    </div>
                </div><!--End of row (col-md-10)-->
            </div><!--End of row-->
        </div><!--jumbotron-->
    </div><!--End fluid body container-->

@endsection

@section('rawJS')
    <script type="text/javascript">

        function showImgUpload(e)
        {
            e.preventDefault();
            document.getElementById('uploadImages').style.display = 'block';
        }



        $(document).on('click', '#findCoords', function(e){
            if (document.getElementById('address').value == '') {
                alert('Enter the shop address!');
                return false;
            }

            //get the address from the address field
            let address = document.getElementById('address').value;

            //get the two target divs, for latitude and longitude displays
            let latElem = document.getElementById('lat');
            //let latElemVal = latElem.value;
            let longElem = document.getElementById('lon');
            //let longElemVal = longElem.value;

            var geocoder = new google.maps.Geocoder();
            /////var address = addressString;
            var latitude;
            var longitude;

            geocoder.geocode( { 'address': address}, function(results, status) {

                if (status == google.maps.GeocoderStatus.OK) {
                    latitude = results[0].geometry.location.lat();
                    longitude = results[0].geometry.location.lng();

                    latElem.value = latitude;
                    longElem.value = longitude;
                }
                else
                {
                    //Change this to two target displays
                    latElem.value = "Could not get latitude coordinates - check the address format!";
                    longElem.value = "Could not get longitude coordinates - check the address format!";
                }
            });

            //---------------------------------------------------
            e.preventDefault();
        });

</script>
@endsection





