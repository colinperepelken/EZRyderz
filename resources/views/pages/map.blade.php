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
 		<h2 id="map-heading">Viewing Your Ride Offer</h2>
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
                <li>
                    <form role="form" method="POST" action="{{ route('map-add-rider') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $offer_id }}" name="offer_id">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="driver_id">
                        <input type="hidden" id="carpooler_id" value="" name="carpooler_id">
                        <input type="hidden" id="request_id" value="" name="request_id">
                        <button id="add-to-group" type="submit">Add to Ride Group</button>
                    </form>
                </li>
            </ul>
        </div>
        <div id="ride-group">
            <h3 id="ride-group-name">My Ride Group</h3>
            @if (isset($riders_info))
                <ul>
                @foreach ($riders_info as $rider)
                    <li>{{ $rider['name'] }}</li>
                @endforeach
                </ul>
            @else
                <p>Add a rider to your ride group!</p>
            @endif
        </div>
        <script async defer
           src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDciWiHhZjf-Aw0St4wFcpo6-oywp_A2Xw&callback=initMap">
        </script>
    </body>
</html>
@endsection