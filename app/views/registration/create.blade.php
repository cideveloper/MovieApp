@extends('layouts.default')

@section('content')
  <div class="page-header">
    <h1>Register</h1>
  </div>
  <div class="row">
    <div class="col-lg-4">
      @include('layouts.partials.errors')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      {{ Form::open(['route' => 'register_path', 'name' => 'registrationForm', 'ng-controller' => 'RegistrationFormController']) }}

          <!-- Email Form Input -->
          <div class="form-group">
              {{ Form::label('email', 'Email:') }}
              {{ Form::email('email', null, ['class' => 'form-control', 'ng-model' => 'email', 'required' => 'required']) }}
          </div>

          <!-- Password Form Input -->
          <div class="form-group">
              {{ Form::label('password', 'Password:') }}
              {{ Form::password('password', ['class' => 'form-control', 'ng-model' => 'password', 'required' => 'required']) }}
          </div>

          <!-- Password_confirmation Form Input -->
          <div class="form-group">
              {{ Form::label('password_confirmation', 'Password Confirmation:') }}
              {{ Form::password('password_confirmation', ['class' => 'form-control', 'ng-model' => 'password_confirmation', 'required' => 'required']) }}
          </div>

          <div class="form-group">
              {{ Form::submit('Sign Up', ['class' => 'btn btn-default']) }}
          </div>

      {{ Form::close() }}
    </div>
  </div>
@stop