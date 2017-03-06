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

<!--Top masthead of the website-->
<header id="welcome-masthead">
  <h1> Sexy Website Header </h1>
</header>

<!--Left portion of the website m-->
<article id="welcome-left-section">
  <nav>
    <a href="#welcome-masthead">- Top of the Page</a> <br>
    <a href="#welcome-bottom">- Bottom of the Page</a> <br>
  </nav>
</article>

<!--Center portion of the website -->
<article id="welcome-center-section">
  <div>
    <p> Some text in the center section </p>
  </div>
</article>

<!--Right portion of the website-->
<article id="welcome-right-section">
  <div>
    <p> Some text in the right section </p>
  </div>
</article>

<footer id="welcome-bottom">
  <div>
    <p> This is the footer </p>
  </div>
</footer>

@endsection