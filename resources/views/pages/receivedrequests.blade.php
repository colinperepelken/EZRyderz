@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>Received Requests</title>
</head>

<body>
  <!--Check if the user has any requests, if they do display all of them-->
  @if (count($requests))
    <?php echo"<script> alert(\"Request is set\"); </script>"; ?>
    <?php foreach ($requests as $request): ?>
      <form method="post">
        {{ csrf_field() }} 
        <legend>{{ $request-> subject }}</legend>
        
        <div class = "receivedrequests-content">
          <!--Display all the content sent with the request -->
          <p><strong>Message: </strong> {{ $request-> msg }}</p>
          <p><strong>Sent Information:</strong></p>
          <p>&nbsp;&nbsp;&nbsp; Pickup address: {{ $request-> start_address }}</p>
          <p>&nbsp;&nbsp;&nbsp; Required Arrival Time: {{ $request-> arrival_time }}</p>
          <p>Sender{{ $request->sender_id }}  Receiver{{ $request->receiver_id }} Request {{ $request->request_id }}</p>
        </div>

        <div class = "receivedrequests-buttons">
          <!--Accept request button -->
          <form style="display:inline;" role="form" method="POST" action="{{ route('requestAccept') }}">
            {{ csrf_field() }}
            <input type="hidden" name="request_id" value="{{ $request->request_id }}">
            <input type="hidden" name="carpooler_id" value="{{ $request->sender_id }}">
            <input type="hidden" name="driver_id" value="{{ $request->receiver_id }}">
            <input type="hidden" name="id" value="{{ $request->id}}>">
            <button type="submit">Accept Request</button>
          </form>

          <!-- Delete request button -->
          <form style="display:inline;" method="post" action="{{ route('requestDecline') }}">
            {{ csrf_field() }} 
            <input type="hidden" name="id" value="{{ $request->id}}>">
            <button type="submit">Decline Request</button>
          </form>
        </div>
      </form>
    <?php endforeach ?>

  <!--If there is no requests, display a redirect form so the user doesnt think an error occured displaying nothing-->
  @else
    <form method="post">
        {{ csrf_field() }} 
        <legend>No requests have been received at this time</legend>
        
        <div class = "receivedrequests-content">
          <p> Remember: Users can only send you a request if you have submitted a schedule!<p>
          <p> Would you like to do that now? <a href="{{ route('schedule') }}">Submin a schedule</a></p>
        </div>
  @endif
</body>
</html>
@endsection

