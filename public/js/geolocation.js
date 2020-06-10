/*!
 * Author Gustav
 * Copyright Nolimit Media
 */

/*!
 * Shows the user their current location latitude/longitude coordinates (geocoding)
 * Shows the location latitude/longitude coordinates of a given address string (reverse geocoding)
 * Shows the user their current location on the map
 * Shows the user the nearest restaurant to their current geolocation
 */

    //---------------------------------------------------------------------------------------------------------//
    //---------------------GET YOUR CURRENT GEO-COORDINATES----------------------------------------------------//
    var x = document.getElementById("geoLocation");

    $(document).on('click', '#getGeolocation', function(){
        //display a loading gif img
        var loadit = $('.loading_gif').css('margin','auto').show();
        $('#geoLocation').html(loadit).show();

        console.log("clicked #getGeolocation");
        getLocation();
    });


    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    
    function showPosition(position) {
        x.innerHTML = "Your latitude: " + position.coords.latitude +
        "<br>Your longitude: " + position.coords.longitude;
    }
    //---------------------------------------------------------------------------------------------------------//






    //---------------------------------------------------------------------------------------------------------//
    //---------------------GEOCODING (getting the lat long coords of a given address)--------------------------//
    /*
     *   This func takes an address string and returns the latitude and longitude coordinates of that address.
     *   May your address string be in the format "51 Glebeland Road, Northampton, NN5 7HA, UK"
     */
    function reverseGeocode(addressString, targetLatDisplayElement, targetLonDisplayElement)
    {
        var geocoder = new google.maps.Geocoder();
        var address = addressString;
        var latitude;
        var longitude;

        geocoder.geocode( { 'address': address}, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                latitude = results[0].geometry.location.lat();
                longitude = results[0].geometry.location.lng();

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
    }
    //---------------------------------------------------------------------------------------------------------//






    //---------------------------------------------------------------------------------------------------------//
    //---------------------GET YOUR SPOT ON THE MAP------------------------------------------------------------//

    $( document ).on( "click", "#getYourSpot", function( event )
    {
        event.preventDefault();

        //display a loading gif img
        var loadit = $('.loading_gif').css('margin','auto').show();
        $('#geoLocation').html(loadit).show();

        $('#map-canvas').toggle();

        //hide anything to do with getting directions
        $('#directions-canvas').hide();
        $('#geoLocation').html('').hide();

        $('#getDirections').text('Get directions to nearest shop');

        if ($('#getYourSpot').text() == 'Get your spot on the map')
        {
            $('#getYourSpot').text('Hide map');
        }
        else
        {
            $('#getYourSpot').text('Get your spot on the map');
        }
        getMapLocation();
    });


    //map page
    var y = document.getElementById("map-canvas");
    var mapLatitude;
    var mapLongitude;
    var myLatlng;
    var myGoogleKey = "AIzaSyBOC9dfqr0RzocAj6UPsyU2c9afyFUX8yc"; 

    function getMapLocation() {
            console.log("getMapLocation");
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showMapPosition);
        } else {
            y.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    
    function showMapPosition(position) {
        //alert(position); //Works
        console.log("showMapPosition");
        mapLatitude = position.coords.latitude;
        mapLongitude = position.coords.longitude;
        
        //alert(mapLongitude); //Works
        
        //alert(new google.maps.LatLng(mapLatitude,mapLongitude)); //Works
        
        myLatlng = new google.maps.LatLng(mapLatitude,mapLongitude);
        
        //display the hidden map-canvas div that will contain the map
        ///////$('.hidden').show();
        
        //alert(myLatlng); //Works
        
        //alert('About to get map from google'); //Works
        
        getMap();
    }


    var map;
    
    function getMap() {
            console.log("getMap");
      var mapOptions = {
        zoom: 12,
        center: new google.maps.LatLng(mapLatitude, mapLongitude),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      
      map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title:"You are here!"
            });
    }
    //---------------------------------------------------------------------------------------------------------//












    //---------------------------------------------------------------------------------------------------------//
    //---------------------GET DIRECTIONS FROM ONE POSITION TO ANOTHER ON THE MAP------------------------------//
    //directionsPage
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var directionsMap;
    var z = document.getElementById("directions-canvas");
    var start;
    var end;



    function getDirectionsLocation() {
            console.log("getDirectionsLocation");
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showDirectionsPosition);
        } else {
            z.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    
    //this code uses the current lat-long coords of the user to create a lat/long obj from Googlemaps which it
    //then uses to pass to another func that will use that obj to create directions to another loc
    function showDirectionsPosition(position) {
        console.log("showDirectionsPosition");
        directionsLatitude = position.coords.latitude;
        directionsLongitude = position.coords.longitude;

        //directionsLatLng below will be our navigation starting point
        directionsLatLng = new google.maps.LatLng(directionsLatitude,directionsLongitude);
        getDirections();
    }


   

    function getDirections() {
        console.log('getDirections');

      var mapOptions = {
          zoom:12,
          center: directionsLatLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          draggable: true,
          mapTypeControl: false,
          zoomControl: false,
          streetViewControl: false,
          scrollwheel: false,
          scaleControl: false,
          rotateControl: false,
          disableDoubleClickZoom: true,
          panControl: false
      };
      directionsMap = new google.maps.Map(document.getElementById("directions-canvas"), mapOptions);

      directionsDisplay = new google.maps.DirectionsRenderer({
          'map': directionsMap,
          'preserveViewport': false,
          'draggable': true,
      });

      calcRoute();
    }

    //we will modify it below to actually use thos lat-long coords of ours (the user) to make an Ajax 
    //call to get the address of the nearest restaurant from the DB and make it the 'end' destination (create directions to it)
    //instead of the fixed address that we used to test it with
    function calcRoute() {
      console.log("calcRoute");

      //Now let's call a func that will make an Ajax req and get us the nearest shop
      //from the DB so we can use as the end destination for our directions routing
      getNearestStore(directionsLatitude, directionsLongitude);

    }



    //---------------------------------------------------------------------------------------------------------//
    // ------------------ AJAX call to handle ck=lick of btn to get directions --------------------------------//

    $('#getDirections').on('click', function(e)
    { 
        e.preventDefault();

        //display a loading gif img
        var loadit = $('.loading_gif').css('margin','auto').show();
        $('#geoLocation').html(loadit).show();
        
        $('#directions-canvas').toggle();
        $('#map-canvas').hide();      
        $('#getYourSpot').text('Get your spot on the map');       
        
        if ($('#getDirections').text() == 'Get directions to nearest shop')
        {
            $('#getDirections').text('Hide directions'); 
        }
        else
        {
           $('#getDirections').text('Get directions to nearest shop');
        }
        
        getDirectionsLocation();
       
    });

    




    function getNearestStore(lat, long)
    {
        //get requests work easily, but in order to make a POST req, LV requires u to send a cross-site-request (csrf)
        //token value thru the req headers. Do it in a ajaxSetup() helper method, and then place a new meta tag elem
        //within your <header> elem of your template like so '<meta name="csrf-token" content="{{ csrf_token() }}" />'
        //OR
        //If you are sending ur ajax req via a form, just add a hidden input field with its value as the csrf tokem
        // like so: '<input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />'
        //and you're good to go-your POST ajax requests will work, and not get rejected by the server
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax(
        {
            url : "neareststore",

            type : 'post',

            data : { lat, long },

            beforeSend: function(XHR)
                {
                    //var loadit = $('.loading_gif').css('margin','auto').show();
                    /*$('#geoLocation').html(loadit).show(); //html() clears every prev content in the elem n places in it what u pass to it- so it clears the glyphicon n shows our loading gif.
                                  //In some cases when forcing jQuery ajax to do non-expected things, the beforeSend event is a great place to do it. For a 	
                                    //while people were using beforeSend to override the mimeType before that was added into jQuery in 1.5.1. You should be 																										
                                        //able to modify just about anything on the jqXHR object in the before send event.*/
                },

            success: function(data)
                {
                    start = directionsLatLng;
      
                    //end = "51 Glebeland road, Northampton NN5 7HA";
                    end = data;
                    var request = {
                            origin:start,
                            destination:end,
                            travelMode: google.maps.TravelMode.DRIVING //TRANSIT (mode of transport)
                        };
                    directionsService.route(request, function(result, status) 
                    {
                        if (status == google.maps.DirectionsStatus.OK) 
                        {
                            directionsDisplay.setDirections(result);
                            $('#geoLocation').html('<p>Navigate to your nearest shop <b>'+data+'</b></p>');
                        }
                    });
                }
            });
        } 
