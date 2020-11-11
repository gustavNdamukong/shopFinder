<?php
$imgCount = count($shopImages);
?>

@extends('layouts.master')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align:center;">
                        <h1>Edit shop {{ $shop->name }}</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{url("feeds{$shop->id}") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}

                            <div class="form-text form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{$shop->name}}" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" value="{{$shop->city}}" class="form-control" />
                            </div>


                            <div class="form-text form-group">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control">{{$shop->address}}</textarea>
                            </div>
                            <button id="findCoords" class="btn btn-sm btn-success">Find the address coordinates</button>


                            <div class="form-text form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control">{{$shop->description}}</textarea>
                            </div>


                            <div class="form-text form-group">
                                <label for="postcode">Postcode</label>
                                <input type="text" id="postcode" name="postcode" value="{{$shop->postcode}}" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="lat">Latitude</label>
                                <input type="text" id="lat" name="lat" value="{{$shop->lat}}" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="lon">Longitude</label>
                                <input type="text" id="lon" name="lon" value="{{$shop->lon}}" class="form-control" />
                            </div>

                            <div class="form-text form-group">
                                <label for="user_id">Created by</label>
                                <input type="text" id="username" name="username" value="{{$shop->created_by}}" class="form-control" readonly/>
                            </div>


                            <table class="table">
                                <thead>
                                    <th>Image name</th>
                                    <th>Image</th>
                                    <th colspan="2" style="text-align:center;">Action</th>
                                </thead>
                                <tbody>
                                <?php $rowNum = 0; ?>
                                @if($imgCount > 0)
                                @foreach($shopImages as $key => $image)
                                    <tr>
                                        <td>{{ $image }}</td>
                                        <td><img src="{{ asset('images/store_imgs/'.$image) }}" width="100" height="100" /></td>
                                        <td><button id="{{$key}}" name="{{$image}}" class="btn btn-xs btn-danger deleteBtn">Delete</button></td>
                                        @if($rowNum == 0)
                                            <td><button id="addImgBtn" onclick="showImgUpload(event)" class="btn btn-sm btn-warning" style="margin-top:{{($imgCount*100)/2}}px;" rowspan="{{ $imgCount }}">Add images</button></td>
                                            <?php $rowNum++; ?>
                                        @endif
                                    </tr>
                                @endforeach
                                @else
                                    <td><button id="addImgBtn" onclick="showImgUpload(event)" class="btn btn-sm btn-warning" style="margin-top:{{($imgCount*100)/2}}px;" rowspan="{{ $imgCount }}">Add images</button></td>
                                @endif
                                </tbody>
                            </table>


                            <div id="uploadImages" style="display:none;">
                                <?php
                                //start a count for file upload fields
                                $fileUploadFieldCount = 1;
                                ?>
                                <h4>You may upload up to 5 images per shop</h4>
                                @for($imgCount; $imgCount< 5; $imgCount++)
                                <input type="file" id="fileUpload<?=$fileUploadFieldCount?>" name="fileUpload[]" />
                                    <?php $fileUploadFieldCount++; ?>
                                @endfor
                            </div>

                            <input type="hidden" value="{{$shop->id}}" name="shopId" />
                            <input id="createShop-token" name="_token" type="hidden" value="{{csrf_token()}}">
                            <a href="{{ url('admin/shops') }}" class="btn btn-sm btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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





        // ###################### AJAX call for when the deleteShopImg BUTTON IS CLICKED ############################ //

        $('.deleteBtn').on('click', function(e)
        {
            e.preventDefault();
            /////let token = $('#createShop-token').val();
            let imageId = this.id;
            let targetElem = document.getElementById(imageId);
            let imageName = this.getAttribute('name');

            //Confirm if they really want to delete the img
            let conf = confirm('Are you sure you want to delete the image: '+imageName);
            if (conf == false)
            {
                return false;
            }

            //get requests work easily, but in order to make a POST req, LV requires u to send a cross-site-request (csrf)
            //token value thru the req headers. Do it in a ajaxSetup() helper method, and then place a new meta tag elem
            //within your <header> elem of your template like so '<meta name="csrf-token" content="{{ csrf_token() }}" />'
            //OR
            //If you are sending ur ajax req via a form, just add a hidden input field with its value as the csrf token
            // like so: '<input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />'
            //and you're good to go-your POST ajax requests will work, and not get rejected by the server
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax(
                {
                    url : "{{ route('deleteShopImg') }}",

                    type : 'post',

                    data : {'imageId': imageId, 'imageName': imageName},

                    beforeSend: function(XHR)
                    {
                        var loadit = $('.loading_gif').css('margin','auto').show();
                        $(targetElem).html(loadit).css(
                                {
                                    'background':'black',
                                    'width':50,
                                    'height':50
                                }); //html() clears every prev content in the elem n places in it what u pass to it- so it clears the glyphicon n shows our loading gif.
                        //In some cases when forcing jQuery ajax to do non-expected things, the beforeSend event is a great place to do it. For a
                        //while people were using beforeSend to override the mimeType before that was added into jQuery in 1.5.1. You should be
                        //able to modify just about anything on the jqXHR object in the before send event.
                    },

                    error: function()
                    {
                        alert('Something went wrong');
                    },

                    success: function(data)
                    {
                        //The ajax request was successful
                        if (data === 'done')
                        {
                            window.location.reload(true);
                        }

                    },

                });

});







//---------------------GEOCODING (getting the lat long coords of a given address aka reverse-geocoding. This works)------------------------------//
/*
*   This func takes an address string and returns the latitude and longitude coordinates of that address.
*   May your address string be in the format "51 Glebeland Road, Northampton, NN5 7HA, UK"
*/
/*function reverseGeocode(addressString, targetLatDisplayElement, targetLonDisplayElement)
{
alert('in reverseGeocode');///////
console.log("in reverseGeocode");

var geocoder = new google.maps.Geocoder();
var address = addressString;
var latitude;
var longitude;

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
latitude = results[0].geometry.location.lat();
longitude = results[0].geometry.location.lng();
alert(latitude+' '+longitude);///////

targetLatDisplayElement.innerHTML = latitude;
targetLonDisplayElement.innerHTML = longitude;
}
else
{
//Change this to two target displays
targetLatDisplayElement.innerHTML = "Could not get latitude coordinates - check the address format!";
targetLonDisplayElement.innerHTML = "Could not get longitude coordinates - check the address format!";
}
});
}*/
//---------------------END REVERSE GEOCODING-------------------------------------------------------------------//

</script>
@endsection





