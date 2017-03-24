@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>Test</title>
</head>

<body>
  <?php foreach ($requests as $request): ?>
    <form method="put">
      {{ csrf_field() }} 
      <legend>{{ $request-> subject }}</legend>
      <p><strong>Message: </strong> {{ $request-> msg }}</p>
      <p><strong>Sent Information:</strong></p>
      <p>&nbsp;&nbsp;&nbsp; Pickup address: {{ $request-> start_address }}</p>
      <p>&nbsp;&nbsp;&nbsp; Required Arrival Time: {{ $request-> arrival_time }}</p>
    </form>
  <?php endforeach ?>
</body>
</html>
@endsection

