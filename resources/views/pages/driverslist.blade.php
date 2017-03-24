@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>List of Drivers</title>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><?php if (isset($all_mine) && $all_mine == true){ echo 'My Ride Offers'; }else{ echo 'All Users Offering a Ride';} ?>
          <div class="panel-body">
            <div class="col-md-6">

              <?php foreach ($all_drivers as $driver): ?>
                <?php $avatar = $driver->avatar; ?>
                <?php $id = $driver->user_id; ?>
                <img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                <strong>{{ $driver->name }}</strong>
                <a href="viewdrivingschedule?id=<?=urlencode($driver->user_id);?>"> Schedule</a>
                <a href="profile?id=<?=$id?>">   Profile</a>
                <a href="sendrequest?receiver_id=<?=urlencode($driver->user_id);?>">   Send Request</a>
                <a href='viewcarinformation?id=<?=urlencode($driver->user_id);?>'>   Car Information</a> <br>

                <?php if (isset($all_mine) && $all_mine): ?>
                  <form style="display:inline;" method="post" action="{{ route('mapshow') }}">
                    {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
                    <input type="hidden" name="offer_id" value="<?=$driver->offer_id?>">
                    <button type="submit">View Details</button>
                  </form>
                  <form style="display:inline;" role="form" method="POST" action="{{ route('map-cancel') }}">
                    {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
                    <input type="hidden" value="<?=$driver->offer_id;?>" name="offer_id">
                    <button type="submit">Cancel Ride Offer</button>
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
