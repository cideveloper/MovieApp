<?php namespace MovieApp\Repositories;

use DB;
use Auth;

class FollowRepository implements FollowRepositoryInterface {


  public function getFollowers(){
    return DB::table('follows')
        ->where('followed_id', Auth::user()->id)
        ->join('users', 'follows.follower_id', '=', 'users.id')
        ->get();
  }

  public function getFollowing(){
    return DB::table('follows')
        ->where('follower_id', Auth::user()->id)
        ->join('users', 'follows.followed_id', '=', 'users.id')
        ->get();
  }

}