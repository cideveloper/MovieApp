<?php namespace MovieApp\Repositories;

interface FollowRepositoryInterface {

  public function getFollowers($user);
  public function getFollowing($user);


}