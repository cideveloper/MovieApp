<?php namespace MovieApp\Repositories;

use Cache;
use cURL;

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

  public function getAll($genre, $quality, $limit, $sort, $set)
  {

    $url = "https://yts.re/api/list.json?";
    $url .= "genre=" . $genre;
    $url .= "&quality=" . $quality;
    $url .= "&limit=" . $limit;
    $url .= "&sort=" . $sort;
    $url .= "&set=" . $set;

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
    return $movies;

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