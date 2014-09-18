<?php

class ProfileController extends \BaseController {

  public function __construct()
  {
		$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('on' => ['post']));
  }

	/**
	 * Show the form for editing the specified resource.
	 * GET /profile/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit()
	{
		$user = Auth::user();
		return View::make('profile.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /profile/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit()
	{

		$id = Auth::user()->id;

		$user = User::findOrFail($id);

		$user->fill(Input::all());

		$user->save();

		Flash::message('User Updated!');

		return Redirect::route('profile.edit');

	}

}