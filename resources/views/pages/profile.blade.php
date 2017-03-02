@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EZRyderz</title>
    </head>
    <body>
    <div class="container">
    <header class="row">
      
    </header>
    <div id="main" class="row">
        <h1>{{ $name }}'s Profile</h1>
        <form>
            <p>Bio:</p>
            <textarea>{{ $bio }}</textarea>
            <p>Location:</p>
            <input id="user_profile_location" size="30" value="{{ $location }}" type="text">
            <br>
            <input type="submit" value="Update">
        </form>
    </div>
    <footer class="row">
        <!-- TODO: add footer -->
    </footer>
    </div>
    </body>
</html>
@endsection