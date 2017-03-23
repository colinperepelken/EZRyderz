function initMap() {

    // custom marker images
    var start_image = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
    var finish_image = 'http://i.imgur.com/vCXHp7U.png';


    var pointA = new google.maps.LatLng(driverStartLat, driverStartLong),
        pointB = new google.maps.LatLng(driverEndLat, driverEndLong),
        myOptions = {
            zoom: 7,
            center: pointA
        },
        map = new google.maps.Map(document.getElementById('map'), myOptions),
        // Instantiate a directions service.
        directionsService = new google.maps.DirectionsService,
        directionsDisplay = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true
        }),
        // markers for the driver route
        markerA = new google.maps.Marker({
            position: pointA,
            title: "point A",
            label: "Your Start",
            map: map,
            icon: start_image
        }),
        markerB = new google.maps.Marker({
            position: pointB,
            title: "point B",
            label: "Your Destination",
            map: map,
            icon: finish_image
        });


        // carpooler pickup markers
        var carpoolerMarkers = [];
        for (var i = 0; i < carpooler_info.length; i++) {
        	new google.maps.Marker({
        		position: new google.maps.LatLng(carpooler_info[i]['lat'], carpooler_info[i]['long']),
        		title: "carpooler" + carpooler_info[i]['id'],
                id: carpooler_info[i]['id'],
                address: carpooler_info[i]['start_address'],
        		label: carpooler_info[i]['username'],
        		map: map
        	}).addListener('click', function() { // pin click listener

                document.getElementById('carpooler-name').innerHTML = "Carpooler: " + this.label;
                document.getElementById('pickup').innerHTML = "Pickip address: " + this.address;
                document.getElementById('profile-link').href = "/profile?id=" + this.id;
                document.getElementById('profile-link').innerHTML = this.label + "'s Profile";
                document.getElementById('add-to-group').style.display = "inline";
                document.getElementById('carpooler_id').value = this.id;

            });
        }



    // get route from A to B
    calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

}



function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
    directionsService.route({
        origin: pointA,
        destination: pointB,
        avoidTolls: true,
        avoidHighways: false,
        travelMode: google.maps.TravelMode.DRIVING
    }, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}

initMap();