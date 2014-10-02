<?php  namespace MovieApp\Users;

class Follow extends \Eloquent {
	protected $fillable = ['follower_id', 'followed_id'];
}