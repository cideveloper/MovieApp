<?php

use MovieApp\Repositories\UserRepositoryInterface;

class FollowsController extends \BaseController {

  public function __construct(UserRepositoryInterface $userRepository)
  {
		$this->beforeFilter('auth');
    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->userRepository = $userRepository;
  }

	/**
	 * Store a newly created resource in storage.
	 * POST /follows
	 *
	 * @return Response
	 */
	public function store()
	{
		//$input = array_add(Input::get(), 'userId', Auth::id());

		$this->userRepository->follow(Input::get('userIdToFollow'), Auth::id());

    Flash::success('You are now following this user.');

    return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /follows/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    //$input = array_add(Input::get(), 'userId', Auth::id());

    $this->userRepository->unfollow(Input::get('userIdToUnfollow'), Auth::id());

    Flash::success('You have now unfollowed this user.');

    return Redirect::back();
	}

}