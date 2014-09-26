@extends('layouts.full')

@section('sidebar')
  @parent

@stop

@section('content')
  <?php
    var_dump($data);
  ?>
@stop