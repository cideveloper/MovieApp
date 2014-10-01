<?php namespace MovieApp\Movies;

interface MovieRepositoryInterface {

  public function getAll($filters);
  public function getUpcoming();
  public function find($id);
  public function getGenres();

}