<?php namespace MovieApp\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

  /**
   * Register Movie Service Provider
   */
  public function register()
  {
    $this->app->bind(
      'MovieApp\Movies\MovieRepositoryInterface',
      'MovieApp\Movies\YTSMovieRepository'
    );
    $this->app->bind(
      'MovieApp\Users\FollowRepositoryInterface',
      'MovieApp\Users\EloquentFollowRepository'
    );
    $this->app->bind(
      'MovieApp\Users\UserRepositoryInterface',
      'MovieApp\Users\UserRepository'
    );
  }

}