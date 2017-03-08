<?php $user = "driver"; ?>

@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css"> 
  </head>

  <body>
    @if (!isset($status)) <!-- displays a form asking if the user is a rider or a driver if that is not set -->
      <form method="get" action="{{ route('schedule') }}">
        <legend>What are you doing?</legend>
        <input type="radio" name="status" value="driver"> I'm offering a ride<br>
        <input type="radio" name="status" value="rider"> I'm looking for a ride<br>
        <input type="submit" value="Next">
      </form>
    @else <!-- else if the status IS set -->
      @if ($status === "driver") <!-- if the user is a driver -->
        <form method="post" action="{{ route('schedule') }}">
          {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
          <input type="hidden" name="status" value="{{ $status }}"> <!-- controller needs to know the status -->
          <fieldset>
            <legend>Driving Schedule Information</legend>

            <div class="schedule-form-address">
              <strong>Starting Address:</strong> 
              <input type="text" name="startAddress" placeholder="Please enter your starting address. (Ex: Your house)"> <br>
              <strong>Destination Address:</strong> 
              <input type="text" name="destAddress" placeholder="Please enter your destination address. (Ex: Your school)"> <br>
            </div>

            <br>
    		  
            <div class="schedule-form-time">
              <strong>Arrival Time: </strong> 
              <input type="time" name="depTime"> <br>
             <strong>End of your day:</strong> 
              <input type="time" name="endTime"> <br>
            </div>

            <!-- This will be used to test if the user is a driver or not -->
            <div class="schedule-form-driver">
                  <strong>Driving Availability: </strong> 
                  <input type="checkbox" name="toDest" value="toDest">To Destination
                  <input type="checkbox" name="fromDest" value="fromDest">From Destination<br>
                  <strong>Max Deviation: </strong>
                  <input type="text" name="maxDeviation" placeholder="How far are you willing to deviate from your original route?"><br>
            </div>

            <p> Select all days that this information applies to. </p>

            <div class="schedule-form-days">
              <input type="checkbox" name="monday" value="monday">Monday
              <input type="checkbox" name="tuesday" value="tuesday">Tuesday
              <input type="checkbox" name="wednesday" value="wednesday">Wednesday
              <input type="checkbox" name="thursday" value="thursday">Thursday
              <input type="checkbox" name="friday" value="friday">Friday
              <input type="checkbox" name="saturday" value="saturday">Saturday
              <input type="checkbox" name="sunday" value="sunday">Sunday <br>
            </div>
    		  
            <div class="schedule-form-buttons">
              <input type ="Reset" value="Clear"> <input type="submit" value="Submit Ride Offer"> 
            </div>

          </fieldset>
        </form> 
        @elseif ($status === "rider") <!-- if the user is a rider -->
          <form method="post" action="{{ route('schedule') }}">
            {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
            <input type="hidden" name="status" value="{{ $status }}"> <!-- controller needs to know the status -->
            <fieldset>
              <legend>Riding Schedule Information</legend>

              <div class="schedule-form-address">
                <strong>Starting Address:</strong> 
                <input type="text" name="startAddress" placeholder="Please enter your starting address. (Ex: Your house)"> <br>
                <strong>Destination Address:</strong> 
                <input type="text" name="destAddress" placeholder="Please enter your destination address. (Ex: Your school)"> <br>
              </div>

              <br>
            
              <div class="schedule-form-time">
                <strong>When do you need to arrive?:</strong> 
                <input type="time" name="depTime"> <br>
            <!--    <strong>End of your day:</strong> 
                <input type="time" name="endTime"> <br>    do we want this option? removed by Colin  -->
              </div>

              <p> Select all days that this information applies to. </p>

              <div class="schedule-form-days">
                <input type="checkbox" name="monday" value="monday">Monday
                <input type="checkbox" name="tuesday" value="tuesday">Tuesday
                <input type="checkbox" name="wednesday" value="wednesday">Wednesday
                <input type="checkbox" name="thursday" value="thursday">Thursday
                <input type="checkbox" name="friday" value="friday">Friday
                <input type="checkbox" name="saturday" value="saturday">Saturday
                <input type="checkbox" name="sunday" value="sunday">Sunday <br>
              </div>
            
              <div class="schedule-form-buttons">
                <input type ="Reset" value="Clear"> <input type="submit" value="Submit Ride Request"> 
              </div>

            </fieldset>
        </form> 
        @endif
    @endif
  </body>
</html>
@endsection