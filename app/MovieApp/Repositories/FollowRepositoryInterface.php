<?php namespace MovieApp\Repositories;

interface FollowRepositoryInterface {

  public function getFollowers();
  public function getFollowing();


}