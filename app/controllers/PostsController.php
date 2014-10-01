<?php

use MovieApp\Posts\PostRepositoryInterface;
use MovieApp\Forms\PostForm;
use MovieApp\Users\User;
use MovieApp\Posts\Post;

class PostsController extends \BaseController {

	protected $post;
	protected $postForm;

  public function __construct(PostRepositoryInterface $post, PostForm $postForm)
  {
    $this->beforeFilter('auth');
    $this->post = $post;
    $this->postForm = $postForm;
  }

	/**
	 * Display a listing of the resource.
	 * GET /posts
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /posts/create
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /posts
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('post');
		$this->postForm->validate($input);

		$post = new Post($input);
		$user = User::find(Auth::id());
		$post = $user->posts()->save($post);

		Flash::overlay('Post Success!', 'Good Job');
		return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 * GET /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /posts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /posts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}