@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>List of Carpoolers</title>
</head>
<?php

$firstName = $_GET["firstName"];
$lastName = $_GET["lastName"];
$all_users = DB::select(DB::raw("SELECT * FROM users"));
$set = 0;

?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Search Results for <?php echo "'".$firstName." ".$lastName."'"?>
          <div class="panel-body">
            <div class="col-md-6">
              <?php foreach ($all_users as $user): ?>
                <?php $id = $user->id; ?>
                <?php $avatar = $user->avatar; ?>
                <?php $name = $user->name; ?>
                <?php $names = explode(" ", $name);
                $dbLastName = array_pop($names);
                $dbFirstName = implode(" ", $names); ?>

                <?php if (strtolower($firstName) == strtolower($dbFirstName)): ?>
                  <?php if (strtolower($lastName) == strtolower($dbLastName)): ?>
                    <?php echo "<br>"; ?>
                    <img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                    <?php echo "<strong>".ucfirst(strtolower($firstName))." ".ucfirst(strtolower($lastName))."</strong>"; ?>
                    <a href="profile?id=<?=$id?>">   Profile</a>
                  <?php elseif ($lastName == NULL): ?>
                    <?php echo "<br>"; ?>
                    <img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                    <?php echo "<strong>".ucfirst(strtolower($firstName))." ".ucfirst(strtolower($dbLastName))."</strong>"; ?>
                    <a href="profile?id=<?=$id?>">   Profile</a>
                  <?php endif ?>

                <?php elseif (strtolower($lastName) == strtolower($dbLastName)): ?>
                  <?php if (strtolower($firstName) == strtolower($dbLastName)): ?>
                    <?php echo "<br>"; ?>
                    <img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                    <?php echo "<strong>".ucfirst(strtolower($firstName))." ".ucfirst(strtolower($lastName))."</strong>"; ?>
                    <a href="profile?id=<?=$id?>">   Profile</a>
                  <?php elseif ($firstName == NULL): ?>
                    <?php echo "<br>"; ?>
                    <img src="/uploads/avatars/{{ $avatar }}" style="width:32px; height:32px; position:relative;">
                    <?php echo "<strong>".ucfirst(strtolower($dbFirstName))." ".ucfirst(strtolower($lastName))."</strong>"; ?>
                    <a href="profile?id=<?=$id?>">   Profile</a>
                  <?php endif ?>

                <?php endif ?>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
