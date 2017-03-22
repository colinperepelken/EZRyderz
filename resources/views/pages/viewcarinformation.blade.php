@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>User Schedule</title>
</head>
<?php
  $driver_id = $_GET["id"];
  $drivers = DB::select(DB::raw("SELECT * FROM users, carinformation WHERE users.id = carinformation.user_id AND ".$driver_id." = users.id"));
  $user = DB::table('users')->where('id', $driver_id)->first();
?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><?php foreach ($drivers as $driver) { echo $driver->name."'s Car Information"; } ?>
        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:32px; height:32px; position:relative;">
        <img src="" alt =""/>
        </div>
        <div class="panel-body">
          <div class="col-md-6">
          <?php
          foreach ($drivers as $driver)
          {
            echo "<strong>Make: </strong>".$driver->make."<br>
            <strong>Model: </strong>".$driver->model."<br>
            <strong>Year: </strong>".$driver->year."<br>
            <strong>Number of Seats: </strong>".$driver->numberOfSeats."<br>
            <strong>Air Conditioning: </strong>".$driver->hasAirConditioning."<br>
            <strong>Fuel Efficiency: </strong>".$driver->efficiency." ".$driver->efficiencyUnits."<br>";
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
