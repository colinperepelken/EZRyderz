@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/all.css" type="text/css"/>
        <link rel="stylesheet" href="../css/bars-1to10.css"/>
        <link rel="stylesheet" href="../css/css-stars.css"/>
        <script src="../js/jquery-1.11.2.min.js"></script>
        <script src="../js/jquery.barrating.min.js"></script>
        <script src="../js/examples.js"></script>

        <title>Ratings</title>
    </head>
    <body>
    <div class="container">
      <h1>Rate User</h1>
      <header class="row">

      </header>
      <?php
      $rating_id = $_GET['id'];
      ?>
      <form id="ratings-form" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('insertrating') }}">
                      {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
      <div class="stars stars-example-css">
        <span class="title">Rate As Driver</span>
        <select id="example-css" name="Drating" autocomplete="off">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        </div><br>

        <div>
        <p>Comment:</p>
        <textarea rows="5" cols="40" name="comment" form="ratings-form">comment</textarea>
        </div>
        <input type = "hidden" value = <?=$rating_id?> name = "rating_id">
        <input type="submit" value="Submit" class="btn btn-primary">
      </form>


    <footer class="row">
        <!-- TODO: add footer -->
    </footer>
    </div>
    </body>
</html>
@endsection
