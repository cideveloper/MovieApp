<?php namespace MovieApp\Repositories;

interface MovieRepositoryInterface {

  public function getAll($filters);
  public function find($id);
  public function getGenres();

}