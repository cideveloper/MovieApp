@extends('layouts.full-wide')

@section('content')
  <div class="row">
    <div class="col-sm-4 col-lg-3">

      <div class="thumbnail">
        <img src="https://placeimg.com/700/500/people" alt="{{ $user->username }}" class="img-responsive" >
        <div class="caption">
          <h3>{{ $user->username }}</h3>
          <p>{{ $user->bio }}</p>
          @unless ($user->is($currentUser))
            @include ('users.partials.follow-button')
          @endif
        </div>
      </div>

    </div>
    <div class="col-sm-8 col-lg-9">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#bio" role="tab" data-toggle="tab">Bio</a></li>
        <li><a href="#followers" role="tab" data-toggle="tab">Followers</a></li>
        <li><a href="#following" role="tab" data-toggle="tab">Following</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="bio">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, voluptas. Repudiandae mollitia doloremque architecto numquam aut quos esse magnam voluptas facilis! Voluptatibus saepe excepturi quasi veritatis aliquam placeat labore dolores.
        </div>
        <div class="tab-pane" id="followers">

            <ul class="friends-list clearfix">
              @foreach ($followers as $follower)
                <li>
                  <a href="{{ route('users.show', $follower->username) }}">
                    <img src="https://placeimg.com/40/40/people" alt="{{ $user->username }}">
                  </a>
                  <div>{{ $follower->username }}</div>
                </li>
              @endforeach
            </ul>

        </div>
        <div class="tab-pane" id="following">

            <ul class="friends-list clearfix">
              @foreach ($following as $followingUser)
                <li>
                  <a href="{{ route('users.show', $follower->username) }}">
                    <img src="https://placeimg.com/40/40/people" alt="{{ $user->username }}">
                  </a>
                  <div>{{ $followingUser->username }}</div>
                </li>
              @endforeach
            </ul>

        </div>
      </div>
    </div>
  </div>
@stop