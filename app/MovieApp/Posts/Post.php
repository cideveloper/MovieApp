<?php namespace MovieApp\Posts;

class Post extends \Eloquent {

  protected $fillable = ['post'];

  /**
   * A status belongs to a user.
   */
  public function user()
  {
      return $this->belongsTo('MovieApp\Users\User');
  }

}