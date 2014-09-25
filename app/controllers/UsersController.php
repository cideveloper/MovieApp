<?php

use MovieApp\Repositories\FollowRepositoryInterface;

class UsersController extends \BaseController {

  public function __construct(FollowRepositoryInterface $follow)
  {
    $this->follow = $follow;
		$this->beforeFilter('auth');
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::All();
		return View::make('users.list', compact('users'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);

    $followers = [];
    $following = [];

    if (Auth::check())
    {
      $followers = $this->follow->getFollowers($id);
      $following = $this->follow->getFollowing($id);
    }

		return View::make('users.show', compact('user', 'followers', 'following'));
	}


}