function initMap() {
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
            map: map
        }),
        // markers for the driver route
        markerA = new google.maps.Marker({
            position: pointA,
            title: "point A",
            label: "Driver Start",
            map: map
        }),
        markerB = new google.maps.Marker({
            position: pointB,
            title: "point B",
            label: "Driver End",
            map: map
        });


        // carpooler pickup maerkers
        var carpoolerMarkers = [];
        for (var i = 0; i < carpooler_positions.length; i++) {
        	carpooler_positions.push(new google.maps.Marker({
        		position: new google.maps.LatLng(carpooler_positions[i]['lat'], carpooler_positions[i]['long']),
        		title: "carpooler" + i,
        		label: "Carpooler " + i,
        		map: map
        	}));
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