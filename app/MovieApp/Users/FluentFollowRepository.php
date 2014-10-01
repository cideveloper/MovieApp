<?php namespace MovieApp\Users;

use DB;
use Auth;

class FluentFollowRepository implements FollowRepositoryInterface {

/**
 * Get Users that are following the current user
 * @return array
 */
  public function getFollowers($id){
    return DB::table('follows')
        ->where('followed_id', $id)
        ->join('users', 'follows.follower_id', '=', 'users.id')
        ->get();
  }

/**
 * Get Users that current user is following
 * @return array
 */
  public function getFollowing($id){
    return DB::table('follows')
        ->where('follower_id', $id)
        ->join('users', 'follows.followed_id', '=', 'users.id')
        ->get();
  }

}