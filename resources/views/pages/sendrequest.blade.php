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
@if (!isset($request_id)) <!-- Choose Driver or Rider-->
  <form method="get" action="{{ route('requestStart') }}">
    <legend>Which schedule would you like to send the driver?</legend>
    <input type="hidden" name="receiver_id" value= "{{ $receiver_id }}"> 
    <input type="hidden" name="offer_id" value= "{{ $offer_id }}"> 
    <input type="text" name="request_id" value= "{{ $request_id }}" placeholder="Enter schedule number."> 
    <input type="submit" value="Next">
  </form>
@else
  <form method="post" action="{{ route('request') }}">
    <!--Include IDs and rider/driver status for future use as hidden fields-->
    <input type="hidden" name="sender_id" value= "{{ $sender_id }}"> 
    <input type="hidden" name="receiver_id" value= "{{ $receiver_id }}"> 
    <input type="hidden" name="request_id" value= "{{ $request_id }}"> 
    <input type="hidden" name="offer_id" value= "{{ $offer_id }}"> 

    <div class="request-form-subject">
      <strong> Subject</strong>
      <input class="form-control" id="subject" name="subject" type="text" maxlength="72"/>
    </div>
       
    <div class="request-form-message">
      <strong> Message</strong>
      <textarea class="form-control" cols="40" id="message" name="message" rows="10"></textarea>
      <span class="help-block"> Message to send to driver</span>
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

