@extends('layouts.default')

@section('content')
  <div class="page-header">
    <h1>Log In</h1>
  </div>
  <div class="row">
    <div class="col-lg-4">
      @include('layouts.partials.errors')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
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
              {{ link_to('/password/remind', 'Reset Your Password') }}
          </div>
      {{ Form::close() }}
    </div>
  </div>
@stop