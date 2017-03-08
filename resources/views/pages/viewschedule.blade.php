<?php $user = "driver"; ?>

@extends('layouts.app')

@section('content')

<!-- Since both the driver schedule and the carpooler schedule are very similar, I put them together into one
file with a condition that checks if the user is a driver. I can seperate this file into 2 files if that's
better though-->

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>User Schedule</title>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Sample Name's Schedule
          <!-- Profile image would be here-->
        <img src="" alt =""/>
        </div>
        <div class="panel-body">
          <div class="col-md-6">
          <!-- Still need input from the database-->
            <p>Starting Address:</p>
            <p>Destination Address:</p>
            <!-- If the user is a driver, show how far off they are willing to deviate from their route-->
            <?php
              if ($user=="driver") {
              echo "<p>Maximum Deviation Off Route:"."</p>";
            }
            ?>
            <p>Departure Time:</p>
            <p>Return Time:<p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
