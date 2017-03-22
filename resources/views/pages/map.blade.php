@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/all.css" type="text/css"/>
        <script type="text/javascript" src="../js/driver-map.js"></script>
        <title>Your Profile</title>
    </head>
    <body>    
 		<h3>Map of Carpooler Pickups</h3>
 		<div id="map"></div>
 		<script async defer
 			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDciWiHhZjf-Aw0St4wFcpo6-oywp_A2Xw&callback=initMap">
 		</script>
    </body>
</html>
@endsection