<?php

class PagesController extends \BaseController {

  public function __construct()
  {

  }

  public function home(){
    return View::make('pages.home');
  }

  public function themes(){

    return [
      ['name' => 'Default', 'src' => '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'],
      ['name' => 'Cerulean', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cerulean/bootstrap.min.css'],
      ['name' => 'Cosmo', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cosmo/bootstrap.min.css'],
      ['name' => 'Cyborg', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/cyborg/bootstrap.min.css'],
      ['name' => 'Darkly', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/darkly/bootstrap.min.css'],
      ['name' => 'Flatly', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/flatly/bootstrap.min.css'],
      ['name' => 'Journal', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/journal/bootstrap.min.css'],
      ['name' => 'Lumen', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/lumen/bootstrap.min.css'],
      ['name' => 'Paper', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/paper/bootstrap.min.css'],
      ['name' => 'Readable', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/readable/bootstrap.min.css'],
      ['name' => 'Sandstone', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css'],
      ['name' => 'Simplex', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/simplex/bootstrap.min.css'],
      ['name' => 'Slate', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/slate/bootstrap.min.css'],
      ['name' => 'Spacelab', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/spacelab/bootstrap.min.css'],
      ['name' => 'Superhero', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/superhero/bootstrap.min.css'],
      ['name' => 'United', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/united/bootstrap.min.css'],
      ['name' => 'Yeti', 'src' => '//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/yeti/bootstrap.min.css']
    ];

  }

  public function error404($code)
  {
    return Response::view('errors.missing', array('code' => $code), 404);
  }

  public function test()
  {
    $data = [];
    return Response::view('pages.test', compact('data'));
  }

}
