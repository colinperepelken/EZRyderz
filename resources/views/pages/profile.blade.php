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
           
                <p>Bio:</p>
                <textarea name="bio" readonly>Somebody once told me the world is gonna roll me
I ain't the sharpest tool in the shed
She was looking kind of dumb with her finger and her thumb
In the shape of an "L" on her forehead

Well the years start coming and they don't stop coming
Fed to the rules and I hit the ground running
Didn't make sense not to live for fun
Your brain gets smart but your head gets dumb
So much to do, so much to see
So what's wrong with taking the back streets?
You'll never know if you don't go
You'll never shine if you don't glow

Hey now, you're an all-star, get your game on, go play
Hey now, you're a rock star, get the show on, get paid
And all that glitters is gold
Only shooting stars break the mold

It's a cool place and they say it gets colder
You're bundled up now, wait till you get older
But the meteor men beg to differ
Judging by the hole in the satellite picture
The ice we skate is getting pretty thin
The water's getting warm so you might as well swim
My world's on fire, how about yours?
That's the way I like it and I never get bored

Hey now, you're an all-star, get your game on, go play
Hey now, you're a rock star, get the show on, get paid
All that glitters is gold
Only shooting stars break the mold

Hey now, you're an all-star, get your game on, go play
Hey now, you're a rock star, get the show, on get paid
And all that glitters is gold
Only shooting stars

Somebody once asked could I spare some change for gas?
I need to get myself away from this place
I said yep what a concept
I could use a little fuel myself
And we could all use a little change

Well, the years start coming and they don't stop coming
Fed to the rules and I hit the ground running
Didn't make sense not to live for fun
Your brain gets smart but your head gets dumb
So much to do, so much to see
So what's wrong with taking the back streets?
You'll never know if you don't go (go!)
You'll never shine if you don't glow

Hey now, you're an all-star, get your game on, go play
Hey now, you're a rock star, get the show on, get paid
And all that glitters is gold
Only shooting stars break the mold

And all that glitters is gold
Only shooting stars break the mold</textarea>
                <p>Location: {{ $location }}</p>
           
                
            @endif
        </div>
    </div>
    <footer class="row">
        <!-- TODO: add footer Hi colin, this is zac :) your footer is going to blend into the background. If you dont want this to happen you are either going to have to make an article/section/aside and just plug it in at the bottom. You can technicly pull footer out of the colour scheme but i rather you didnt -->
    </footer>
    </div>
    </body>
</html>
@endsection