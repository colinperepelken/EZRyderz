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
  <?php foreach ($requests as $request): ?>
    <form method="post">
      {{ csrf_field() }} 
      <legend>{{ $request-> subject }}</legend>
      <div class = "receivedrequests-content">
        <p><strong>Message: </strong> {{ $request-> msg }}</p>
        <p><strong>Sent Information:</strong></p>
        <p>&nbsp;&nbsp;&nbsp; Pickup address: {{ $request-> start_address }}</p>
        <p>&nbsp;&nbsp;&nbsp; Required Arrival Time: {{ $request-> arrival_time }}</p>
        <p>Sender{{ $request->sender_id }}  Receiver{{ $request->receiver_id }} Request {{ $request->request_id }}</p>
      </div>

      <div class = "receivedrequests-buttons">
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
</body>
</html>
@endsection

