@extends('layouts.full')

@section('content')

  <div class="users">
    @foreach ($users->chunk(4) as $userSet)
      <div class="row">
        @foreach ($userSet as $user)
          <div class="col-sm-3">
            <div>
              <a href="{{ route('users.show', $user->username) }}" class="user-block">
                <img src="{{ $user->profile_pic }}" alt="{{ $user->username }}" class="img-responsive" >
                <div class="">
                  {{ $user->username }}
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  </div>


  {{ $users->links() }}
@stop