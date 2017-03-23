@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>List of Drivers</title>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">All Users Offering a Ride
          <div class="panel-body">
            <div class="col-md-6">
              <?php
                foreach ($all_drivers as $driver) {
                  $avatar = $driver->avatar;
                  $id = $driver->user_id;
                  echo "<img src=\"/uploads/avatars/$avatar\" style=\"width:32px; height:32px; position:relative;\"><strong>".$driver->name."</strong>
                  <a href='viewdrivingschedule?id=".urlencode($driver->user_id)."'><strong>Schedule</strong></a> <a href='profile?id=$id'>Profile</a>";


                  if ($all_mine) {
                    echo '<form style="display:inline;" method="get" action="map">';
                    echo '<button type="submit">View Details</button></form>';
                    echo '<form style="display:inline;" method="get" action="">';
                    echo '<button type="submit">Cancel</button></form>';
                  }

                  echo "<br>";
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
