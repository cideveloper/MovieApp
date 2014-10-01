<?php namespace MovieApp\Users;

interface FollowRepositoryInterface {

  public function getFollowers($user);
  public function getFollowing($user);


}