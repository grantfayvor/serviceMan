app.controller('MainController', ['$scope', 'MainService', function ($scope, MainService) {

	$scope.user = "";

	$scope.initialize = function () {
		initMap();
	};

	$scope.getUser = function () {
		MainService.getUser(function (response) {
			$scope.user = response.data;
		}, function (response) {

		});
	};

	var initMap = function () {
        //confirm this code
        if (google === undefined || !google) {
            $http.get("https://maps.googleapis.com/maps/api/js?key=AIzaSyBC2k94EGV8e3uVNgElIEUSXa8X-Rfw8ZY&sensor=false");
        }
        google.maps.visualRefresh = true;
        var mapOptions = {
            center: new google.maps.LatLng(17.240498, 82.287598),
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("google-map"), mapOptions);
        // var geoMarker = new GeolocationMarker(map);
        var markerOptions = {
            position: map.getCenter(),
            map: map,
            animation: google.maps.Animation.Drop
        };
        marker = new google.maps.Marker(markerOptions);
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                //made pos a global object defined in config.js
                pos = {
                     lat: position.coords.latitude,
                     lng: position.coords.longitude
                };

                marker.setPosition(pos);
                map.setCenter(pos);
                getAddress(pos);
                /*setTimeout(function(){
                    console.log("this is the address");
                    console.log(address);
                }, 1000);*/

            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            }, {
                    maximumAge: 600000,
                    timeout: 5000,
                    enableHighAccuracy: true
                });
        } else {
            handleLocationError(false, infoWindow, map.getCenter);
        }
        var infoWindow = new google.maps.InfoWindow({
            content: "current center of the map"
        });
        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.open(map, marker);
        });
	};

    var getAddress = function(coordinates){
        var geoCoder = new google.maps.Geocoder;
        var infoWindow = new google.maps.InfoWindow;
        geoCodeLatLng(geoCoder, map, coordinates, infoWindow);
    };

     var geoCodeLatLng = function(geoCoder, map, coordinates, infoWindow) {
        geoCoder.geocode({'location': coordinates}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    map.setZoom(11);
                    var marker = new google.maps.Marker({
                        position: coordinates,
                        map: map
                    });
                    infoWindow.setContent(results[0].formatted_address);
                    infoWindow.open(map, marker);
                    var address = results[0].formatted_address;
                    MainService.setLocation(address);
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geo coding failed due to: ' + status);
            }
        });
    };

	var handleLocationError = function (browserHasGeoLocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeoLocation ? "Error: The GeoLocation service failed." : "Error: Your browser does not support geolocation");
        infoWindow.open(map);
    };

}]);

app.service('MainService', ['APIService', function (APIService) {

	this.getUser = function (successHandler, errorHandler) {
		APIService.get('/api/user', successHandler, errorHandler);
	};

    this.setLocation = function (location, successHandler, errorHandler) {
        APIService.put('/api/user/setLocation?location=' +location, {}, successHandler, errorHandler);
    };

}]);