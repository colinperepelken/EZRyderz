@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head lang="{{ config('app.locale') }}">
  <title>EZRyderz</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/all.css" type="text/css"/>
  <script>

        // set JS variables from PHP here
        var driver_groups = <?php echo json_encode($driver_groups); ?>;
        var rider_groups = <?php echo json_encode($rider_groups); ?>;

    </script>
  <script type="text/javascript" src="../js/ridegroup.js"></script>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4" style="background-color:white;">
    	<h2>My Ride Groups</h2>
    	<div id="list-groups">
    		<h2>As a Driver</h2>
    		@if (isset($driver_groups))
    			<li>
          <?php $counter = 0; ?>
	    		@foreach ($driver_groups as $group)
	    			<ul><button type="button" onclick="updateDriverMap(<?=$counter?>)">{{ $group['driver_end_address'] }}</button></ul>
            <?php $counter++; ?>
	    		@endforeach
	    		</li>
	    	@else
	    		<p>No ride groups...</p>
	    	@endif
	    	<h2>As a Rider</h2>
	    	@if (isset($rider_groups))
    			<li>
          <?php $counter=0; ?>
	    		@foreach ($rider_groups as $group)
	    			<ul><button type="button" onclick="updateRiderMap(<?=$counter?>)">{{ $group['driver_end_address'] }}</button></ul>
            <?php $counter++; ?>
	    		@endforeach
	    		</li>
	    	@else
	    		<p>No ride groups...</p>
	    	@endif
	    </div>
    </div>
    <div class="col-sm-8" style="background-color:white; border-left:1px solid black;">
    	<h2>Details</h2>
    	<div id="group-details">
    		<p>Click a group for more details...</p>
    		<div id="map">
            <!-- MAP WILL BE RENDERED HERE -->
        	</div>


        	<script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDciWiHhZjf-Aw0St4wFcpo6-oywp_A2Xw&callback=initMap">
        </script>
    	</div>
    </div>
  </div>
</div>
</body>
</html>
@endsection