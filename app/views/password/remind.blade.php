@extends('layouts.default')

@section('content')
  <div class="page-header">
    <h1>Need to reset your password?</h1>
  </div>
  <div class="row">
    <div class="col-lg-4">
      @include('layouts.partials.errors')
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      {{ Form::open() }}
          <!-- Email Form Input -->
          <div class="form-group">
              {{ Form::label('email', 'Email:') }}
              {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
          </div>

          <!-- Send Reminder Input -->
          <div class="form-group">
              {{ Form::submit('Send Reminder', ['class' => 'btn btn-default']) }}
          </div>
      {{ Form::close() }}
    </div>
  </div>
@stop