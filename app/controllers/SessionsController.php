<?php

use MovieApp\Forms\SignInForm;

class SessionsController extends \BaseController {

	/**
	 * @var SignInForm
	 */
	private $signInForm;

	/**
	 * @param SignInForm $signInForm
	 */
	public function __construct(SignInForm $signInForm)
	{
	    $this->signInForm = $signInForm;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::only('email', 'password');

		$this->signInForm->validate($formData);

		if ( ! Auth::attempt($formData))
		{
			Flash::error('We were unable to sign you in. Please check your credentials and try again!');
			return Redirect::back()->withInput();
		}

		Flash::message('Welcome back!');

		return Redirect::intended('/');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		Flash::message('You have now been logged out.');

		return Redirect::home();
	}


}
