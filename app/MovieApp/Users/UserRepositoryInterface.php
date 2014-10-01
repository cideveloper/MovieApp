<?php namespace MovieApp\Users;

interface UserRepositoryInterface {

  public function findByUsername($username);
  public function findById($id);
  public function getPaginated($howMany);
  public function follow($userIdToFollow, $userId);
  public function unfollow($userIdToUnfollow, $userId);

}