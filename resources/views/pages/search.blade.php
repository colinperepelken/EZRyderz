@extends('layouts.app')

@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>User Search</title>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Search for Users</div>
        <div class="panel-body">
          <form role = "form" method = "GET" class="form-horizontal" action = "{{ route('searchlist') }}">
            {{ csrf_field() }}
                <div class="form-group">
                  <label for="model" class="col-md-4 control-label">First Name: </label>
                  <div class="col-md-6">
                    <input class="form-control" type = "text" name = "firstName" placeholder = "Insert First Name Here"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Last Name: </label>
                  <div class="col-md-6">
                    <input class="form-control" type = "text" name = "lastName" placeholder = "Insert Last Name Here"/>
                  </div>
                </div>
                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </div>
                  </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
