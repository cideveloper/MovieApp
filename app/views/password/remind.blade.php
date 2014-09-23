@extends('layouts.full')

@section('content')
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h1>Need to reset your password?</h1>
      </div>
      @include('layouts.partials.errors')
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