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

<div class="wrapper">
  <header class="header"><h1> Welcome to EZRyderz </h1></header>
  <article class="main">
    <div>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<p>
    </div>
  </article>
  <aside class="aside aside-1">Fun facts about driving?<br> Other random info? <br> Can be kept or removed </aside>
  <aside class="aside aside-2">Advertisements can go here</aside>
</div>

@endsection