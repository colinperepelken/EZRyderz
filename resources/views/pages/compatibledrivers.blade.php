@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>List of Compatible Drivers</title>
</head>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">All Compatible Drivers for this Ride Request
          <div class="panel-body">

              <?php $carpooler_id = $_GET["offer_id"];
              $minutes = $_GET["minutes"];
              $ac = $_GET["hasAirConditioning"];
              $carpoolers = DB::select(DB::raw("SELECT * FROM users, ride_requests WHERE users.id = ride_requests.user_id AND ".$carpooler_id." = users.id"));
              $user = DB::table('ride_requests')->where('request_id', $carpooler_id)->first(); ?>

              <?php foreach ($all_drivers as $driver): ?>
                <?php $driver_arrival_time = $driver->arrival_time; ?>
                <?php $user_arrival_time = $user->arrival_time; ?>
                <?php $driver_time = DateTime::createFromFormat("H:i", $driver_arrival_time); ?>
                <?php $user_time = DateTime::createFromFormat("H:i", $user_arrival_time); ?>
                <?php $result = $driver_time->format("H:i"); ?>
                <?php $time_difference = $driver_time->diff($user_time); ?>
                <?php $time_diff = $time_difference->format("%i"); ?>
                <?php $time_diff2 = $time_difference->format("%H"); ?>

                <?php if ($ac == 'no'): ?>
                  <?php if ($driver->destination_address == $user->destination_address && $time_diff < $minutes && $time_diff2 == 0): ?>                                                                                        <! logged in user's ride request destination_address>
                  <?php $avatar = $driver->avatar; ?>
                  <?php $id = $driver->user_id; ?>
                  <hr><img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                  <strong>{{ $driver->name }}</strong>
                  <a href="viewdrivingschedule?id=<?=urlencode($driver->user_id);?>"><strong>Schedule</strong></a>
                  <a href="profile?id=<?=$id?>">Profile</a>
                  <a href='viewcarinformation?id=<?=urlencode($driver->user_id);?>'><strong>Car Information</strong></a><br>
                  <strong>Destination Address: {{ $driver->destination_address}}</strong></br>
                  <strong>Arrival Time: {{ $driver->arrival_time}}</strong></br>
                  <strong>Has Air Conditioning? {{ $driver->hasAirConditioning}}</strong></br>
                  <?php endif ?>
                <?php endif ?>

                <?php if ($ac == 'yes'): ?>
                  <?php if ($driver->destination_address == $user->destination_address && $time_diff < $minutes && $time_diff2 == 0 && $driver->hasAirConditioning == 'yes'): ?>                                                                                     <! logged in user's ride request destination_address>
                  <?php $avatar = $driver->avatar; ?>
                  <?php $id = $driver->user_id; ?>
                  <hr><img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                  <strong>{{ $driver->name }}</strong>
                  <a href="viewdrivingschedule?id=<?=urlencode($driver->user_id);?>"><strong>Schedule</strong></a>
                  <a href="profile?id=<?=$id?>">Profile</a>
                  <a href='viewcarinformation?id=<?=urlencode($driver->user_id);?>'><strong>Car Information</strong></a><br>
                  <strong>Destination Address: {{ $driver->destination_address}}</strong></br>
                  <strong>Arrival Time: {{ $driver->arrival_time}}</strong></br>
                  <strong>Has Air Conditioning? {{ $driver->hasAirConditioning}}</strong></br>
                  <?php endif ?>
                <?php endif ?>
                <?php endforeach ?>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
