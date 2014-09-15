<?php

class AngularController extends BaseController {

  public function home(){
    $themes = json_decode(json_encode($this->themes()));
    return View::make('home-angular')->withThemes($themes);
  }

  public function json(){
    return [
      ['name' => 'Darius Patel', 'age' => 34],
      ['name' => 'Alvin Chen', 'age' => 34],
      ['name' => 'Eric Voisard', 'age' => 30],
      ['name' => 'Larry Coker', 'age' => 38]
    ];
  }

  public function genres(){
    return ['Action', 'Adventure', 'Animation', 'Biography', 'Comedy', 'Crime', 'Documentary', 'Drama', 'Family', 'Fantasy', 'Film-Noir', 'History', 'Horror', 'Music', 'Musical', 'Mystery', 'Romance', 'Sci-Fi', 'Sport', 'Thriller', 'War', 'Western'];
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

  public function movies($genre = "All", $quality = "All", $limit = 20, $sort = "date"){
    $url = "https://yts.re/api/list.json?";
    $url .= "genre=" . $genre;
    $url .= "&quality=" . $quality;
    $url .= "&limit=" . $limit;
    $url .= "&sort=" . $sort;

    if (Cache::has($url))
    {
      return Cache::get($url);
    }
    else
    {
      $response = cURL::get($url);
      Cache::put($url, $response->body, 60);
      return $response->body;
    }
  }

  public function movie($id){
    $url = "https://yts.re/api/movie.json?id=" . $id;

    if (Cache::has($url))
    {
      return Cache::get($url);
    }
    else
    {
      $response = cURL::get($url);
      Cache::put($url, $response->body, 60);
      return $response->body;
    }
  }

}
