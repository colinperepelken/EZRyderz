@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/all.css" type="text/css"/>
        <title>Your Profile</title>
    </head>
    <body>
    <div class="container">
    <header class="row">

    </header>
    <div id="main" class="row">
        <h1>{{ $name }}'s Profile</h1>
        <div id="profile-image">
            <img src="/uploads/avatars/{{ $avatar }}">
        </div>
        <div id="profile-content">
            @if (Auth::Guest() || Auth::user()->id != $user_id) <!-- if user is not logged in or profile does not belong to this user -->
                <p>Bio:</p>
                <textarea name="bio" readonly>{{ $bio }}</textarea>
                <p>Location: {{ $location }}</p>
                <a href='ratings'>Rate As Driver</a><br>
            @else
                @if ($updated)
                    <div id="update success" style="background-color: #66ff66; width: 135px;"> <!-- TODO: make this look nicer... also shouldn't be inline CSS, put in the sheet -->
                        <p>Update Successful!</p>
                    </div>
                @endif
                <form id="profile-form" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('profile') }}">
                                {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
                    Update Profile Picture:<input type="file" name="avatar">
                    <br>
                    <p>Bio:</p>
                    <textarea rows="5" cols="40" name="bio" form="profile-form">{{ $bio }}</textarea>
                    <p>Location:</p>
                    <input id="user_profile_location" size="30" value="{{ $location }}" type="text" name="location">
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <br>
                    <input type="submit" value="Update" class="btn btn-primary">
                </form>
            @endif
        </div>
    </div>
    <footer class="row">
        <!-- TODO: add footer -->
    </footer>
    </div>
    </body>
</html>
@endsection
