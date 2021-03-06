<?php

use MovieApp\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

  /**
   * @var RegistrationForm
   */
  private $registrationForm;

  /**
   * Constructor
   *
   * @param RegistrationForm $registrationForm
   */
  function __construct(RegistrationForm $registrationForm)
  {
    $this->registrationForm = $registrationForm;
  }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

    $input = Input::only('username', 'email', 'password', 'password_confirmation');

		$this->registrationForm->validate($input);

    $user = User::create($input);

    Auth::login($user);

    Flash::overlay('Glad to have you as a new MovieApp member!', 'Welcome');

    return Redirect::home();
	}

}
