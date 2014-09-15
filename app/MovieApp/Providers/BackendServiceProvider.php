<?php namespace MovieApp\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

  /**
   * Register Movie Service Provider
   */
  public function register()
  {
    $this->app->bind(
      'MovieApp\Repositories\MovieRepositoryInterface',
      'MovieApp\Repositories\YTSMovieRepository'
    );
  }

}