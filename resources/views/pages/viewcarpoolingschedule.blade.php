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
  $carpooler_id = $_GET["id"];
  $carpoolers = DB::select(DB::raw("SELECT * FROM users, ride_requests WHERE users.id = ride_requests.user_id AND ".$carpooler_id." = users.id"));
  $user = DB::table('users')->where('id', $carpooler_id)->first();
?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><?php foreach ($carpoolers as $carpooler) { echo $carpooler->name."'s Riding Schedule"; } ?>
          <!-- Profile image -->
        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:32px; height:32px; position:relative;">
        </div>
        <div class="panel-body">
          <div class="col-md-6">
          <?php
          foreach ($carpoolers as $carpooler)
          {
            echo "<strong>Starting Address: </strong>".$carpooler->start_address."<br>
            <strong>Destination Address: </strong>".$carpooler->destination_address."<br>
            <strong>Departure Time: </strong>".$carpooler->arrival_time."<br>
            <strong>Return Time: </strong>Carpoolers dont currently have a time field in the ride_requests table<br>";
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
