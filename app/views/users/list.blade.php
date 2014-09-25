@extends('layouts.full')

@section('content')
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Users</div>

    <!-- List group -->
    <div class="list-group">
      @foreach ($users as $user)
        <a href="{{ route('users.show', $user->id) }}" class="list-group-item">
          <span class="badge">Follow</span>
          <h4 class="list-group-item-heading">{{ $user->username }}</h4>
          <p class="list-group-item-text">
            {{ $user->bio }}
          </p>
        </a>
      @endforeach
    </div>
  </div>
@stop