<?php namespace MovieApp\Repositories;

use User;

class UserRepository implements UserRepositoryInterface {

  public function getPaginated($howMany = 25)
  {
      return User::orderBy('username', 'asc')->paginate($howMany);
  }

  public function findByUsername($username){
    return User::whereUsername($username)->first();
  }

}