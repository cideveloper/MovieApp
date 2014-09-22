<?php

use MovieApp\Repositories\MovieRepositoryInterface;

class MovieController extends \BaseController {

  protected $movies;

  public function __construct(MovieRepositoryInterface $movies)
  {
		$this->beforeFilter('auth');

    $this->movies = $movies;
    //$this->beforeFilter('auth', array('except' => 'getLogin'));
    //$this->beforeFilter('csrf', array('on' => 'post'));
    //$this->afterFilter('log', array('only' => array('fooAction', 'barAction')));
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
  {

    $page = Input::get('page', 1);
    $sort = Input::get('sort', "date");
    $limit = Input::get('limit', 24);
    $quality = Input::get('quality', "All");
    $genre = Input::get('genre', "All");

    $filter_array = [
      'page' => $page,
      'sort' => $sort,
      'limit' => $limit,
      'quality' => $quality,
      'genre' => $genre
    ];

    $movies = $this->movies->getAll($genre, $quality, $limit, $sort, $page);

    $paginator = Paginator::make((array) $movies, $movies->MovieCount, $limit);

    $view_array = [
      'movies' => $movies,
      'paginator' => $paginator,
      'genres' => $this->movies->getGenres(),
      'filter' => $filter_array
    ];

    return View::make('movies.movies', $view_array);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $movie = $this->movies->find($id);
    return View::make('movies.movie', compact('movie'));
	}


}
