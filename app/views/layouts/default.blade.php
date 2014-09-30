@extends('layouts.master')

@section('template')
  <div class="container">

    @include('layouts.partials.nav')

    <div class="row">
      <div class="col-sm-3 col-lg-2 hidden-xs">
        <div class="sidebar">
          @section('sidebar')
          @show
        </div>
      </div>
      <div class="col-sm-9 col-lg-10">
        <div id="master-view">
          @include('flash::message')

          @yield('content')
        </div>
      </div>
    </div>

    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
      <div class="container">
        ...
      </div>
    </nav>

  </div>
@stop