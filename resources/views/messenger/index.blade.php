@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading"><h3>Messages</h3>
          <div class="panel-body">
            <div class="col-md-6">
    @include('messenger.partials.flash')

    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
    </div>
    </div>
    </div>
    </div>
    </div>
@stop
