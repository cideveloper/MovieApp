<?php namespace MovieApp\Repositories;

use Auth;
use User;

class EloquentFollowRepository implements FollowRepositoryInterface {

/**
 * Get Users that are following the current user
 * @return object Illuminate\Database\Eloquent\Collection
 */
  public function getFollowers($id){
    return User::find($id)->followers;
  }

/**
 * Get Users that current user is following
 * @return object Illuminate\Database\Eloquent\Collection
 */
  public function getFollowing($id){
    return User::find($id)->following;
  }

}