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
    <div class="container">
    <header class="row">
      <h1>Welcome to EZRyderz!</h1>
    </header>
    <div id="main" class="row">
      <p>Site coming soon...</p>
    </div>
    <footer class="row">
        <!-- TODO: add footer -->
    </footer>
    </div>
  </body>
</html>
@endsection