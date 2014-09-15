@extends('layouts.default')

@section('sidebar')
    @parent

    <p>Single Movie</p>
@stop

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="page-header">
        <h1>{{ $movie->MovieTitleClean }} <small>{{ $movie->MovieYear }}</small></h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <img src="{{ $movie->LargeCover }}" alt="">
    </div>
    <div class="col-md-9">
      <div class="page-header">
        <h3>Description</h3>
      </div>
      <p>{{ $movie->LongDescription }}</p>
      <div class="page-header">
        <h3>Cast List</h3>
      </div>
      <ul class="list-unstyled">
        @foreach ($movie->CastList as $castMember)
        <li>
          {{ $castMember->ActorName }}
        </li>
        @endforeach
      </ul>
      <div class="page-header">
        <h3>Information</h3>
      </div>
      <dl class="dl-horizontal">
        <dt>Size</dt>
        <dd>{{ $movie->Size }}</dd>
        <dt>Quality</dt>
        <dd>{{ $movie->Quality }}</dd>
        <dt>Seeds/Peers</dt>
        <dd>{{ $movie->TorrentSeeds }}/{{ $movie->TorrentPeers }}</dd>
      </dl>
      <hr>
      <div class="page-header">
        <h3>Trailer</h3>
      </div>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $movie->YoutubeTrailerID }}"></iframe>
      </div>
      <hr>
      <a href="{{ $movie->TorrentUrl }}" class="btn btn-info btn-block">Download</a>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <?php
      //var_dump($movie);
      ?>
    </div>
  </div>
@stop