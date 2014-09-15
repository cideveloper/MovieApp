<?php namespace MovieApp\Repositories;

use Cache;
use cURL;

class YTSMovieRepository implements MovieRepositoryInterface {

  public function getAll($genre, $quality, $limit, $sort)
  {

    $url = "https://yts.re/api/list.json?";
    $url .= "genre=" . $genre;
    $url .= "&quality=" . $quality;
    $url .= "&limit=" . $limit;
    $url .= "&sort=" . $sort;

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

}