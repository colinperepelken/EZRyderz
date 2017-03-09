@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>List of Carpoolers</title>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">All Users Requesting a Ride
          <div class="panel-body">
            <div class="col-md-6">
              <?php
                foreach ($all_carpoolers as $carpooler) {
                  echo "<img src='.$carpooler->avatar.' alt ='Profile Image'/><strong>".$carpooler->name."</strong>
                  <a href='viewcarpoolingschedule?id=".urlencode($carpooler->user_id)."'><strong>Schedule</strong></a> <a href=''>Profile</a><br>";
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
