<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

/*
 * Registration!
 */
Route::get('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);

Route::post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);

/**
 * Sessions
 */
Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);

Route::post('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);

Route::get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

Route::controller('password', 'RemindersController');

/**
 * Movies
 */
Route::get('movies/{genre?}/{quality?}/{limit?}/{sort?}', [
    'as' => 'movies',
    'uses' => 'MovieController@index'
]);

Route::get('movie/{id}', [
    'as' => 'movie',
    'uses' => 'MovieController@show'
]);

/*
Route::get('/', [
  'uses' => 'AngularController@home',
  'as' => 'home'
]);

Route::get('/json', [
  'uses' => 'AngularController@json',
  'as' => 'json'
]);

Route::get('/genres', [
  'uses' => 'AngularController@genres',
  'as' => 'genres'
]);

Route::get('/themes', [
  'uses' => 'AngularController@themes',
  'as' => 'themes'
]);

Route::get('/movie/{id}', [
  'uses' => 'AngularController@movie',
  'as' => 'movie'
]);

Route::get('/movies/{genre?}/{quality?}/{limit?}/{sort?}', [
  'uses' => 'AngularController@movies',
  'as' => 'movies'
]);

Route::group(array('prefix' => 'auth'), function()
{

    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::get('check', 'AuthController@isLoggedIn');

});
*/