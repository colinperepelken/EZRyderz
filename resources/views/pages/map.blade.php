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
            var carpooler_info = <?php echo json_encode($carpooler_info); ?>

        </script>
        <script type="text/javascript" src="../js/driver-map.js"></script>
        <title>Map</title>
    </head>
    <body>    
 		<h2>Viewing Your Ride Offer</h2>
 		<div id="map">
            <!-- MAP WILL BE RENDERED HERE -->
        </div>
        <div id="info">
            <h3>Your Ride Offer</h3>
            <ul>
                <li>Your Start Address: {{ $driver_start_address }}</li>
                <li>Your Destination: {{ $driver_end_address }}</li>
                <li>
                    <form role="form" method="POST" action="{{ route('map-cancel') }}">
                        {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
                        <input type="hidden" value="{{ $offer_id }}" name="offer_id">
                        <button type="submit">Cancel Ride Offer</button>
                    </form>
                </li>
            </ul>
            <h3 id="carpooler-name">Click a pin for more info...</h3>
            <ul>
                <li id="pickup">Pickup address:</li>
                <li><a id="profile-link" href=""></a></li>
                <li><button id="add-to-group" type="button">Add to Ride Group</button></li>
            </ul>
        </div>
        <script async defer
           src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDciWiHhZjf-Aw0St4wFcpo6-oywp_A2Xw&callback=initMap">
        </script>
    </body>
</html>
@endsection