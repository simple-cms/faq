<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Blog\Post\RepositoryInterface;
use SimpleCms\Core\BaseController;
use View;

class PublicController extends BaseController {

  /**
   * Store our RepositoryInterface implementation.
   *
   * @var Simple\Blog\Post\RepositoryInterface
   */
  protected $post;

  /**
   * Set up the class
   *
   * @param Simple\Blog\Post\RepositoryInterface $posts
   *
   * @return void
   */
  public function __construct(RepositoryInterface $post)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->post = $post;
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return View::make('blog::Public/Post/Index', [
      'metaTitle' => 'Home page title',
      'metaDesciption' => 'Home page description',
      'posts' => $this->post->paginate()
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function show($slug)
  {
    return View::make('blog::Public/Post/Show', [
      'metaTitle' => 'slug page title',
      'metaDesciption' => 'slug page description',
      'post' => $this->post->getFirstBy('slug', $slug)
    ]);
  }

}