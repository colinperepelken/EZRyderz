@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head lang="{{ config('app.locale') }}">
  <title>Test Title</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/all.css" type="text/css"/>
</head>
<body>

<div class="wrapper">
  <header class="header"><h1> Sexy Website Header </h1></header>
  <article class="main">
    <p>Lots of sexy destails about our website.</p>  
  </article>
  <aside class="aside aside-1">Sexy stuff here? <br> Do we need this? </aside>
  <aside class="aside aside-2">Tons room for sexy advertisements</aside>
  <footer class="footer">EZRyderz &copy; All stuff is illegal and whatnot!.... Sexy</footer>
</div>

@endsection