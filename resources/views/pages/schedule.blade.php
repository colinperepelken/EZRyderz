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
    <!--The php below should switch between Driver and Carpooler depending on the user.-->
      
    <form method="post" action="/action_page.php">
      <fieldset>
        <legend>Schedule Information</legend>

        <div class="schedule-form-address">
          <strong>Starting Address:</strong> 
          <input type="text" name="startAddress" placeholder="Please enter your starting address. (Ex: Your house)"> <br>
          <strong>Destination Address:</strong> 
          <input type="text" name="destAddress" placeholder="Please enter your destination address. (Ex: Your school)"> <br>
        </div>

        <br>
		  
        <div class="schedule-form-time">
          <strong>Departure Time:</strong> 
          <input type="time" name="depTime"> <br>
          <strong>End of your day:</strong> 
          <input type="time" name="endTime"> <br>
        </div>

        <!-- This will be used to test if the user is a driver or not -->
        <div class="schedule-form-driver">
          <?php 
            if ($user=="driver") {
              echo "<strong>Driving availability: </strong> 
                    <input type=\"checkbox\" name=\"toDest\" value=\"toDest\">To Destination
                    <input type=\"checkbox\" name=\"fromDest\" value=\"fromDest\">From Destination<br>";
            }?>
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
          <input type ="Reset" value="Clear"> <input type="submit" value="Submit"> 
        </div>

      </fieldset>
    </form> 
  </body>
</html>
@endsection