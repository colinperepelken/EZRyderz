@extends('layouts.app')

<?php use Cornford\Googlmapper\Facades\MapperFacade as Mapper; ?>

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/all.css" type="text/css"/>

        <script>

            // set JS variables from PHP here
            var driverStartLat = {{ $driver_start['lat'] }};
            var driverStartLong = {{ $driver_start['long'] }};
            var driverEndLat = {{ $driver_end['lat'] }};
            var driverEndLong = {{ $driver_end['long'] }};
            var rideRequests = <?php echo json_encode($ride_requests); ?>;

        </script>
        <script type="text/javascript" src="../js/driver-map.js"></script>
        <title>Map</title>
    </head>
    <body>    
 		<h3>Map of Carpooler Pickups</h3>
 		<div id="map">
            <!-- MAP WILL BE RENDERED HERE -->
        </div>
        <script async defer
           src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDciWiHhZjf-Aw0St4wFcpo6-oywp_A2Xw&callback=initMap">
        </script>
    </body>
</html>
@endsection