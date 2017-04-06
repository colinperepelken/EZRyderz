@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head lang="{{ config('app.locale') }}">
  <title>EZRyderz</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/all.css" type="text/css"/>
</head>
<body>
<embed src="../css/song.mp3" loop="true" autostart="true" hidden="true"/>
<div class="wrapper">
  <header class="header"><h1> Welcome to EZRyderz </h1></header>
  <article class="main">
    <div>
      <figure>
        <img style="float:left;" src="http://www.psdgraphics.com/file/green-business-graph.jpg" width="320" height="240"/>
      </figure>
      <p>Look how much money we save you! Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.<p>
    </div>
  </article>
  <aside class="aside aside-1">
  @if (Auth::guest())
    Fun facts about driving?<br> Other random info? <br> Can be kept or removed 
  @else
    <a href="{{ route('ridegroup') }}">My Ride Groups</a>
  @endif
  </aside>
  <aside class="aside aside-2">
    <img class="advertisement" src="http://www.takepart.com/sites/default/files/styles/tp_gallery_slide/public/slogan-itok=C7mRvp9G.jpg"/>
    <img class="advertisement" src="https://divorcediscourse.com/wp-content/uploads/2011/05/BadAds2.jpeg"/>
    <img class="advertisement" src="https://s-media-cache-ak0.pinimg.com/236x/8b/bd/40/8bbd4050d3e348a36882f89966532f88.jpg"/>
    <img class="advertisement" src="https://media.licdn.com/mpr/mpr/AAEAAQAAAAAAAANdAAAAJGJhOGE1YWUwLWJmNjQtNDk2NC05MGI4LWRlYTJmOGE2N2U0MA.jpg"/>
    <img class="advertisement" src="http://www.designyourway.net/diverse/absolut/absolut_vodka_family.jpg"/>

  </aside>
</div>

@endsection