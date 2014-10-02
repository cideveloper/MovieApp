<?php
/**
 * Remove Fake Posts in show method
 */
use MovieApp\Users\FollowRepositoryInterface;
use MovieApp\Users\UserRepositoryInterface;
use MovieApp\Posts\PostRepositoryInterface;
use Faker\Factory as Faker;

class UsersController extends \BaseController {

  protected $follow;
  protected $userRepository;

  public function __construct(FollowRepositoryInterface $follow, UserRepositoryInterface $userRepository, PostRepositoryInterface $post)
  {
    $this->beforeFilter('auth');
    $this->follow = $follow;
    $this->userRepository = $userRepository;
    $this->post = $post;
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $users = $this->userRepository->getPaginated(18);
		return View::make('users.list', compact('users'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string $username
	 * @return Response
	 */
	public function show($username)
	{
		$user = $this->userRepository->findByUsername($username);

    $followers = [];
    $following = [];
    $posts = [];

    $faker = Faker::create();
    foreach(range(1, 10) as $index)
    {
      array_push($posts, ['post' => $faker->realText, 'created_at' => $faker->date . ' ' . $faker->time ]);
    }

    if (Auth::check())
    {
      $followers = $this->follow->getFollowers($user);
      $following = $this->follow->getFollowing($user);
    }

		return View::make('users.show', compact('user', 'followers', 'following', 'posts'));
	}


}