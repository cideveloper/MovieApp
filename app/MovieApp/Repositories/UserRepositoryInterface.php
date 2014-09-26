<?php namespace MovieApp\Repositories;

interface UserRepositoryInterface {

  public function findByUsername($username);
  public function getPaginated($howMany);

}