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
                  echo "<img src=\"/uploads/avatars/$avatar\" style=\"width:32px; height:32px; position:relative;\"><strong>".$driver->name."</strong>
                  <a href='viewdrivingschedule?id=".urlencode($driver->user_id)."'><strong>Schedule</strong></a> <a href=''>Profile</a><br>";
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
