@extends('layouts.full')

@section('sidebar')
  @parent

@stop

@section('content')
  <div class="row">
    <div class="col-sm-8">
      <p>This is my body content.</p>
    </div>
    <div class="col-sm-4">
      @if ($currentUser)

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Followers</div>

          <!-- List group -->
          <div class="list-group">
            @foreach ($followers as $follower)
              <a href="{{ route('users.show', $follower->id) }}" class="list-group-item">
                <h4 class="list-group-item-heading">ID: {{ $follower->id }}</h4>
                <p class="list-group-item-text">email: {{ $follower->email }}</p>
              </a>
            @endforeach
          </div>
        </div>

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Following</div>

          <!-- List group -->
          <div class="list-group">
            @foreach ($following as $following_user)
              <a href="{{ route('users.show', $following_user->id) }}" class="list-group-item">
                <h4 class="list-group-item-heading">ID: {{ $following_user->id }}</h4>
                <p class="list-group-item-text">email: {{ $following_user->email }}</p>
              </a>
            @endforeach
          </div>
        </div>

      @endif
    </div>
  </div>

@stop