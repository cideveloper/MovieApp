<?php namespace MovieApp\Repositories;

use Auth;
use User;

class EloquentFollowRepository implements FollowRepositoryInterface {

/**
 * Get Users that are following the current user
 * @return object Illuminate\Database\Eloquent\Collection
 */
  public function getFollowers($user){
    return $user->followers;
  }

/**
 * Get Users that current user is following
 * @return object Illuminate\Database\Eloquent\Collection
 */
  public function getFollowing($user){
    return $user->following;
  }

}