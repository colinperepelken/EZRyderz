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
              <?php
                foreach ($all_drivers as $driver) {
                  $avatar = $driver->avatar;
                  $id = $driver->user_id;
                  echo "<hr><img src=\"/uploads/avatars/$avatar\" style=\"width:32px; height:32px; position:relative;\"><strong> ".$driver->name."</strong>
                  <a href='viewdrivingschedule?id=".urlencode($driver->user_id)."'><strong>Schedule</strong></a> <a href='profile?id=$id'><strong>Profile</strong></a>
                  <a href='viewcarinformation?id=".urlencode($driver->user_id)."'><strong>Car Information</strong></a><br>";
                }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
