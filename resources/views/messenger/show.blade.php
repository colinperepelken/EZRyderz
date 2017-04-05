@extends('layouts.app')

@section('content')
            <div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-body">
            <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('messenger.partials.messages', $thread->messages, 'message')

        @include('messenger.partials.form-message')
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@stop
