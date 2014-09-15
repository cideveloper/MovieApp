<?php

class MovieController extends \BaseController {

    public function __construct()
    {
			$this->beforeFilter('auth');
	    //$this->beforeFilter('auth', array('except' => 'getLogin'));
	    //$this->beforeFilter('csrf', array('on' => 'post'));
	    //$this->afterFilter('log', array('only' => array('fooAction', 'barAction')));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($genre = "All", $quality = "All", $limit = 20, $sort = "date"){
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
    return View::make('movies.movies', compact('movies'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
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
    return View::make('movies.movie', compact('movie'));
	}


}
