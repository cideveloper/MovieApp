<?php

class AuthController extends \BaseController {

	public function login()
	{
		if (Auth::attempt(array('email' => Input::json('email'), 'password' => Input::json('password'))))
		{
		  return Response::json(Auth::user());
		}
		else
		{
			return Response::json(array('flash' => 'Invalid Username or Password', 'email' => Input::json('email'), 'password' => Input::json('password')), 500);
		}
	}


	public function logout()
	{
		Auth::logout();
		return Response::json(array('flash' => 'User Logged Out'));
	}

	public function isLoggedIn(){
		return Response::json([
			'check' => Auth::check(),
			'user'  => Auth::user(),
			'id'    => Auth::id()
		]);
	}

}