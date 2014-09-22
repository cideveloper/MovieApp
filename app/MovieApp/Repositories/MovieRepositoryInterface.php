<?php namespace MovieApp\Repositories;

interface MovieRepositoryInterface {

  public function getAll($genre, $quality, $limit, $sort, $set);
  public function find($id);
  public function getGenres();

}