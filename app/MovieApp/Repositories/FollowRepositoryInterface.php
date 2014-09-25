<?php namespace MovieApp\Repositories;

interface FollowRepositoryInterface {

  public function getFollowers($id);
  public function getFollowing($id);


}