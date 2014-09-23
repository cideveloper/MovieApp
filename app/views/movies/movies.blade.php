@extends('layouts.default')

@section('sidebar')
  @parent

  <div class="page-header">
    <h1>Upcoming</h1>
  </div>
  <div class="list-group">
    @foreach ($upcoming as $upcoming_movie)
      <a href="{{ $upcoming_movie->ImdbLink }}" class="list-group-item" target="_blank">
        <h4 class="list-group-item-heading">{{ $upcoming_movie->MovieTitle }}</h4>
        <p class="list-group-item-text">
          <img class="img-thumbnail" src="{{ $upcoming_movie->MovieCover }}" alt="{{ $upcoming_movie->MovieTitle }}">
        </p>
      </a>
    @endforeach
  </div>

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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="pull-right">
            Expand Filters
          </a>
          <span class="label label-primary">{{ $filter['genre'] }}</span>
          <span class="label label-success">{{ $filter['quality'] }}</span>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
          {{ Form::open(['class' => '', 'method' => 'GET']) }}
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
            <div class="form-group">
              <label for="sort">Keyword Search: </label>
              {{ Form::text('keywords', $filter['keywords'], ['class' => 'form-control']); }}
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