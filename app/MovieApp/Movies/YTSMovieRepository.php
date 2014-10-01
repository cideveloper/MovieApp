<?php namespace MovieApp\Movies;

use Cache;
use cURL;
use Paginator;

class YTSMovieRepository implements MovieRepositoryInterface {

  protected $genres = [
    'All' => 'All',
    'Action' => 'Action',
    'Adventure' => 'Adventure',
    'Animation' => 'Animation',
    'Biography' => 'Biography',
    'Comedy' => 'Comedy',
    'Crime' => 'Crime',
    'Documentary' => 'Documentary',
    'Drama' => 'Drama',
    'Family' => 'Family',
    'Fantasy' => 'Fantasy',
    'Film-Noir' => 'Film-Noir',
    'History' => 'History',
    'Horror' => 'Horror',
    'Music' => 'Music',
    'Musical' => 'Musical',
    'Mystery' => 'Mystery',
    'Romance' => 'Romance',
    'Sci-Fi' => 'Sci-Fi',
    'Sport' => 'Sport',
    'Thriller' => 'Thriller',
    'War' => 'War',
    'Western' => 'Western'
    ];

  public function getAll($filters)
  {

    $url = "https://yts.re/api/list.json?";
    $url .= http_build_query($filters);

    if (Cache::has($url))
    {
      $movies = json_decode(Cache::get($url));
    }
    else
    {
      $response = cURL::get($url);
      Cache::put($url, $response->body, 60);
      $movies = json_decode($response->body);
    }

    extract($filters);

    $paginator = Paginator::make((array) $movies, $movies->MovieCount, $filters['limit']);

    unset($filters['set']);

    return [
      'movies' => $movies,
      'paginator' => $paginator,
      'genres' => $this->getGenres(),
      'filter' => $filters,
      'url' => $url,
      'upcoming' => $this->getUpcoming()
    ];


  }

  public function getUpcoming()
  {
    $url = "https://yts.re/api/upcoming.json";

    if (Cache::has($url))
    {
      $upcoming = json_decode(Cache::get($url));
    }
    else
    {
      $response = cURL::get($url);
      Cache::put($url, $response->body, 60);
      $upcoming = json_decode($response->body);
    }

    return $upcoming;

  }

  public function find($id)
  {
    $url = "https://yts.re/api/movie.json?id=" . $id;

    if (Cache::has($url))
    {
      $movie = json_decode(Cache::get($url));
    }
    else
    {
      $response = cURL::get($url);
      Cache::put($url, $response->body, 60);
      $movie = json_decode($response->body);
    }
    return $movie;
  }

  public function getGenres()
  {
    return $this->genres;
  }

}