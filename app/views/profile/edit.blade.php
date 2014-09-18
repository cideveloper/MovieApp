@extends('layouts.default')

@section('sidebar')
    @parent

@stop

@section('content')
  <div class="page-header">
    <h1>Edit Profile</h1>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-4">
      @include('layouts.partials.errors')
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-4">
      {{ Form::model($user, ['name' => 'profileUpdateForm']) }}

          <!-- Name Form Input -->
          <div class="form-group">
              {{ Form::label('name', 'Name:') }}
              {{ Form::text('name', null, ['class' => 'form-control']) }}
          </div>

          <!-- Location Form Input -->
          <div class="form-group">
              {{ Form::label('location', 'Location:') }}
              {{ Form::text('location', null, ['class' => 'form-control']) }}
          </div>

          <!-- Website Form Input -->
          <div class="form-group">
              {{ Form::label('website', 'Website:') }}
              {{ Form::text('website', null, ['class' => 'form-control']) }}
          </div>

          <!-- Bio Form Input -->
          <div class="form-group">
              {{ Form::label('bio', 'Bio:') }}
              {{ Form::textarea('bio', null, ['class' => 'form-control']) }}
          </div>

          <div class="form-group">
              {{ Form::submit('Save Changes', ['class' => 'btn btn-default']) }}
          </div>

      {{ Form::close() }}
    </div>
  </div>
@stop