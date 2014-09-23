@extends('layouts.full')

@section('content')
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
      <div class="page-header">
        <h1>Log In</h1>
      </div>
      @include('layouts.partials.errors')
      {{ Form::open(['route' => 'login_path']) }}
          <!-- Email Form Input -->
          <div class="form-group">
              {{ Form::label('email', 'Email:') }}
              {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
          </div>

          <!-- Password Form Input -->
          <div class="form-group">
              {{ Form::label('password', 'Password:') }}
              {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
          </div>

          <!-- Sign In Input -->
          <div class="form-group">
              {{ Form::submit('Sign In', ['class' => 'btn btn-default']) }}
              {{ link_to('/password/remind', 'Reset Your Password', ['class' => 'btn btn-primary']) }}
          </div>
      {{ Form::close() }}
    </div>
  </div>
@stop