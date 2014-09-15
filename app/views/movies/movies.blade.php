@extends('layouts.default')

@section('sidebar')
    @parent

    <p>All Movies.</p>
@stop

@section('content')
  <div class="movie_container clearfix">
    @foreach ($movies->MovieList as $movie)
    <a class="movie_box pull-left" href="/movie/{{ $movie->MovieID }}">
      <img class="movie_cover img-thumbnail" src="{{ $movie->CoverImage }}" alt="{{ $movie->MovieTitle }}">
      <div class="movie_meta">
        <span class="movie_title text-primary">{{ $movie->MovieTitleClean }}</span>
        <span class="movie_year text-muted">{{ $movie->MovieYear }}</span>
      </div>
    </a>
    @endforeach
  </div>
@stop