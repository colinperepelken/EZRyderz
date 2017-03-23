@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>List of Carpoolers</title>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><?php if (isset($all_mine) && $all_mine == true){ echo 'My Ride Requests'; }else{ echo 'All Users Requesting a Ride';} ?>
          <div class="panel-body">
            <div class="col-md-6">

              <?php foreach ($all_carpoolers as $carpooler): ?>
                <?php $avatar = $carpooler->avatar; ?>
                <?php $id = $carpooler->user_id; ?>
                <img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                <strong>{{ $carpooler->name }}</strong>
                <a href="viewcarpoolingschedule?id=<?=urlencode($carpooler->user_id);?>"><strong>Schedule</strong></a>
                <a href="profile?id=<?=$id?>">Profile</a>

                <?php if (isset($all_mine) && $all_mine): ?>
                  <form style="display:inline;" method="get" action="{{ route('map') }}">
                    <input type="hidden" name="offer_id" value=""> <!-- this will not work on this page... see driverslist.blade.php -->
                    <button type="submit">View Details</button>
                  </form>
                  <form style="display:inline;" method="get" action="">
                    <button type="submit">Cancel</button>
                  </form>
                <?php endif ?>
                <br>
              <?php endforeach ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
