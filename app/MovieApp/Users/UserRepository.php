<?php namespace MovieApp\Users;

use MovieApp\Users\User;

class UserRepository implements UserRepositoryInterface {

  public function getPaginated($howMany = 25)
  {
    return User::orderBy('username', 'asc')->paginate($howMany);
  }

  public function findByUsername($username){
    return User::whereUsername($username)->first();
  }

  public function findById($id)
  {
    return User::findOrFail($id);
  }

  public function follow($userIdToFollow, $userId)
  {
    $user = $this->findById($userId);
    return $user->following()->attach($userIdToFollow);
  }

  public function unfollow($userIdToUnfollow, $userId)
  {
    $user = $this->findById($userId);
    return $user->following()->detach($userIdToUnfollow);
  }

}