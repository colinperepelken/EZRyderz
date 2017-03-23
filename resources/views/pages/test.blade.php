@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>Test</title>
</head>

<body>
        <h1>---Test Data---</h1>
        <h2>{{ $subject }}</h2>
        <p>Message: {{ $msg }}</p>
        <p>Address: {{ $address }}. Time: {{ $time }}</p>
</body>

@endsection


