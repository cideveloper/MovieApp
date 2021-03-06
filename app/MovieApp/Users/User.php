<?php namespace MovieApp\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = ['email', 'username', 'password', 'name', 'gender', 'location', 'website', 'bio', 'profile_pic'];

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

  public function setPasswordAttribute($password)
  {
      $this->attributes['password'] = Hash::make($password);
  }

  public function following()
  {
    return $this->belongsToMany('MovieApp\Users\User', 'follows', 'follower_id', 'followed_id')->withTimestamps();
  }

  public function followers()
  {
    return $this->belongsToMany('MovieApp\Users\User', 'follows', 'followed_id', 'follower_id')->withTimestamps();
  }

  public function isFollowedBy(User $otherUser)
  {
    $idsWhoOtherUserFollows = $otherUser->following()->lists('followed_id');
    return in_array($this->id, $idsWhoOtherUserFollows);
  }

  public function posts()
  {
    return $this->hasMany('MovieApp\Posts\Post');
  }

  public function is($user)
  {
      if (is_null($user)) return false;

      return $this->username == $user->username;
  }

}
