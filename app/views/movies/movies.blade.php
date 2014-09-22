@extends('layouts.default')

@section('sidebar')
    @parent

    <p>All Movies.</p>
@stop

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="page-header">
        <h1>Browse Movies</h1>
      </div>
    </div>
  </div>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" href="">
            Filters:
          </a>
          <span class="label label-primary">{{ $filter['genre'] }}</span> <span class="label label-success">{{ $filter['quality'] }}</span>
          <?php
          //var_dump($filter);
          ?>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
          {{ Form::open(['class' => 'form-inline clearfix', 'method' => 'GET']) }}
            <div class="form-group">
              <label for="genre">Genre: </label>
              {{ Form::select('genre', $genres, $filter['genre'], ['class' => 'form-control']); }}
            </div>
            <div class="form-group">
              <label for="quality">Quality: </label>
              {{ Form::select('quality', ['All' => 'All', '720p' => '720p', '1080p' => '1080p', '3D' => '3D'], $filter['quality'], ['class' => 'form-control']); }}
            </div>
            <div class="form-group">
              <label for="limit">Display per Page: </label>
              {{ Form::select('limit', ['20' => '20', '30' => '30', '40' => '40', '50' => '50'], $filter['limit'], ['class' => 'form-control']); }}
            </div>
            <div class="form-group">
              <label for="sort">Sort By: </label>
              {{ Form::select('sort', ['date' => 'date', 'seeds' => 'seeds', 'peers' => 'peers', 'size' => 'size', 'alphabet' => 'alphabet', 'rating' => 'rating', 'downloaded' => 'downloaded', 'year' => 'year'], $filter['sort'], ['class' => 'form-control']); }}
            </div>
            <button type="submit" class="btn btn-default">Search</button>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  <div class="paginator">
    <?php echo $paginator->appends($filter)->links(); ?>
  </div>
  <div class="movie_container clearfix">
    @foreach ($movies->MovieList as $movie)
    <a class="movie_box pull-left" href="/movie/{{ $movie->MovieID }}" data-toggle="popover" data-trigger="hover" title="{{ $movie->MovieTitleClean }}" data-html="true" data-content="Quality: {{ $movie->Quality }}<br>Size: {{ $movie->Size }}<br>TorrentPeers: {{ $movie->TorrentPeers }}<br>TorrentSeeds: {{ $movie->TorrentSeeds }}">
      <img class="movie_cover img-thumbnail" src="{{ $movie->CoverImage }}" alt="{{ $movie->MovieTitle }}">
      <div class="movie_meta">
        <span class="movie_title text-primary">{{ $movie->MovieTitleClean }}</span>
        <span class="movie_year text-muted">{{ $movie->MovieYear }}</span>
      </div>
    </a>
    @endforeach
  </div>
  <div class="paginator">
    <?php echo $paginator->appends($filter)->links(); ?>
  </div>
@stop