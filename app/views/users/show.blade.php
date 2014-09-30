@extends('layouts.full-wide')

@section('content')
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-3">
      <div class="thumbnail">
        <img src="{{ $user->profile_pic }}" alt="{{ $user->username }}" class="img-responsive" >
        <div class="caption">
          <h3>{{ $user->username }}</h3>
          <p>{{ $user->bio }}</p>
          @unless ($user->is($currentUser))
            @include ('users.partials.follow-button')
          @endif
        </div>
      </div>
    </div>
    <div class="col-sm-8 col-md-5 col-lg-6">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#posts" role="tab" data-toggle="tab">POSTS {{ count($posts) }}</a></li>
        <li><a href="#followers" role="tab" data-toggle="tab">FOLLOWERS {{ count($followers) }}</a></li>
        <li><a href="#following" role="tab" data-toggle="tab">FOLLOWING {{ count($following) }}</a></li>
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
                    <img src="{{ $follower->profile_pic }}" alt="{{ $follower->username }}">
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
                  <a href="{{ route('users.show', $followingUser->username) }}">
                    <img src="{{ $followingUser->profile_pic }}" alt="{{ $followingUser->username }}">
                  </a>
                  <div>{{ $followingUser->username }}</div>
                </li>
              @endforeach
            </ul>

        </div>
      </div>
    </div>
    <div class="hidden-sm col-md-3 col-lg-3">
      <div class="well">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores velit officia fugiat deleniti, cum odit at? Maiores odit fugit porro. Tempore saepe deserunt illum pariatur ad aspernatur, consequatur tempora eligendi.</div>
      <div class="well">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque magni quae, deserunt ullam officia nesciunt, iste voluptate aliquam animi commodi. Nobis suscipit assumenda dolor asperiores obcaecati accusantium, eligendi quasi voluptatibus!</div>
    </div>
  </div>
@stop