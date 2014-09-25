@extends('layouts.full')

@section('content')
  <div class="row">
    <div class="col-md-4">

      <div class="thumbnail">
        <img src="http://placehold.it/500x400" alt="{{ $user->username }}" class="img-responsive" >
        <div class="caption">
          <h3>{{ $user->username }}</h3>
          <p>{{ $user->bio }}</p>
          <p><a href="#" class="btn btn-primary" role="button">Follow</a>
        </div>
      </div>

    </div>
    <div class="col-md-8">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#bio" role="tab" data-toggle="tab">Bio</a></li>
        <li><a href="#follow" role="tab" data-toggle="tab">Follow</a></li>
        <li><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
        <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="bio">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, voluptas. Repudiandae mollitia doloremque architecto numquam aut quos esse magnam voluptas facilis! Voluptatibus saepe excepturi quasi veritatis aliquam placeat labore dolores.
        </div>
        <div class="tab-pane" id="follow">
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
        </div>
        <div class="tab-pane" id="messages">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi magni repellendus dolorem esse, beatae quo sapiente rerum accusamus quibusdam tenetur eligendi similique repudiandae aliquam tempore consectetur aliquid nesciunt nemo!
        </div>
        <div class="tab-pane" id="settings">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia neque consequuntur adipisci, ad fuga facere odit distinctio debitis dolor, cum temporibus, saepe illum voluptate recusandae laborum autem vel obcaecati quia.
        </div>
      </div>
    </div>
  </div>
@stop