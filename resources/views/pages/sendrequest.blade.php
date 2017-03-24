@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>Send Request</title>
</head>

<!-- HTML Form-->
<body>
@if (!isset($status)) <!-- Choose Driver or Rider-->
  <form method="get" action="{{ route('requestStart') }}">
    <legend>What are you doing?</legend>
    <input type="radio" name="status" value="rider"> Ask a rider to join you.<br>
    <input type="radio" name="status" value="driver"> Ask a driver to drive you.<br>
    <input type="hidden" name="receiver_id" value= "{{ $receiver_id }}"> 
    <input type="submit" value="Next">
  </form>
@else
  <form method="post" action="{{ route('request') }}">
    <!--Include ID and rider/driver status for future use as hidden fields-->
    <input type="hidden" name="sender_id" value= "{{ $sender_id }}"> 
    <input type="hidden" name="receiver_id" value= "{{ $receiver_id }}"> 
    <input type="hidden" name="target" value= "{{ $status }}">  

    <div class="request-form-subject">
      <strong> Subject </strong>
      <input class="form-control" id="subject" name="subject" type="text"/>
    </div>
       
    <div class="request-form-message">
      <strong> Message </strong>
      <textarea class="form-control" cols="40" id="message" name="message" rows="10"></textarea>
      <span class="help-block"> Message sent to {{ $status }} </span>
    </div>
       
    <div class="request-form-sendinfo">
      <strong> Send Schedule Information? </strong> <br>
      <input name="infoOpt" type="radio" value="yes"/> Yes 
      <input name="infoOpt" type="radio" value="no"/> No <br>
      <span class="help-block"> Include information from your schedule (Time + Location) </span>
    </div>
    
    <input type="submit" value="Submit"/>
  </form>
</body>
</html>
@endif
@endsection

