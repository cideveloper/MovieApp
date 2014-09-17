@extends('layouts.default')

@section('sidebar')
    @parent

@stop

@section('content')
  <h1>404</h1>
  <h3>{{ $code }}</h3>
@stop