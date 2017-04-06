@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>List of Carpoolers</title>
</head>

<?php if (isset($all_mine) && $all_mine): ?>
  <?php $count = 0; ?>
  <?php foreach ($all_carpoolers as $carpooler): ?>
  <?php $count++; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading"><?php if (isset($all_mine) && $all_mine == true){ echo 'My Ride Request #'.$count; }else{ echo 'All Users Requesting a Ride';} ?>
            <div class="panel-body">
              <div class="col-md-6">

                  <?php $avatar = $carpooler->avatar; ?>
                  <?php $id = $carpooler->user_id; ?>
                  <img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                  <strong>{{ $carpooler->name }}</strong>
                  <?php echo "<a href='viewcarpoolingschedule?reqid=".urlencode($carpooler->request_id)."&id=".urlencode($carpooler->user_id)."'> Schedule </a>"; ?>
                  <a href="profile?id=<?=$id?>">   Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Driver Criteria</div>
          <div class="panel-body">

  <form method="get" class="form-horizontal" action="{{ route('compatibledrivers') }}">
    {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
    <div class="form-group">
      <label class="col-md-4 control-label">Maximum Difference in Arrival Times: </label>
      <div class="col-md-6">
        <select class="form-control" name = "minutes">
          <option value = "5">5 minutes</option>
          <option value = "10">10 minutes</option>
          <option value = "15">15 minutes</option>
          <option value = "20">20 minutes</option>
          <option value = "25">25 minutes</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label">Minimum Driver Rating? (5 is highest, 1 is lowest) </label>
      <div class="col-md-6">
        <select class="form-control" name = "minRating">
          <option value = "1">1</option>
          <option value = "2">2</option>
          <option value = "3">3</option>
          <option value = "4">4</option>
          <option value = "5">5</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label">Is Air Conditioning a Must? </label>
      <div class="col-md-6">
        <div class="">
        <input type = "radio" name = "hasAirConditioning" value = "yes">Yes
        <input type = "radio" name = "hasAirConditioning" value = "no" checked>No
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label">Should the Driver's Car Be a Smoking or a Non-Smoking Environment? </label>
    <div class="col-md-6">
      <div class="">
      <input type = "radio" name = "hasSmoking" value = "yes">Smoking
      <input type = "radio" name = "hasSmoking" value = "no" checked>Non-Smoking
    </div>
  </div>
</div>
    <input type="hidden" name="offer_id" value="<?=$carpooler->request_id;?>"> <!-- this will not work on this page... see driverslist.blade.php -->
    <button class="btn btn-primary" type="submit">Find Drivers for Me!</button>
  </form>
  <form style="display:inline;" role="form" method="POST" action="{{ route('map-cancel') }}">
    {{ csrf_field() }} <!-- this is needed to post form, do not delete -->
    <input type="hidden" value="<?=$carpooler->request_id;?>" name="offer_id"><br>
    <button type="submit">Cancel Ride Request</button>
  </form>

</div>
</div>
</div>
</div>
</div>
</div>
<?php endforeach ?>


<?php else: ?>
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
                  <?php echo "<a href='viewcarpoolingschedule?reqid=".urlencode($carpooler->request_id)."&id=".urlencode($carpooler->user_id)."'> Schedule </a>"; ?>
                  <a href="profile?id=<?=$id?>">   Profile</a>
                  <a href="sendrequest?receiver_id=<?=urlencode($carpooler->user_id);?>">   Send Request</a> <br>
                <?php endforeach ?>
              <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
