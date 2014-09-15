<?php namespace MovieApp\Repositories;

interface MovieRepositoryInterface {

  public function getAll($genre, $quality, $limit, $sort);
  public function find($id);

}