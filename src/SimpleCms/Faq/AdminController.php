<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Core\BaseController;
use SimpleCms\Blog\Category\RepositoryInterface as CategoryRepositoryInterface;
use View;
use Redirect;

class AdminController extends BaseController {

  /**
   * @var Simple\Blog\Post\RepositoryInterface
   */
  protected $post;

  /**
   * @var SimpleCms\Blog\Category\RepositoryInterface
   */
  protected $category;

  /**
   * Set up the class
   *
   * @param Simple\Blog\Post\RepositoryInterface $post
   *
   * @return void
   */
  public function __construct(RepositoryInterface $post, CategoryRepositoryInterface $category)
  {
    // Call the parent constructor just in case
    parent::__construct();

    $this->post = $post;
    $this->category = $category;
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return View::make('blog::Admin/Post/Index', [
      'posts' => $this->post->all(['category'])
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('blog::Admin/Post/Form', [
      'categories' => $this->category->getSelectArray()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CreateRequest $request)
  {
    $post = $this->post->store($request->all());

    return Redirect::route('control.post.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully created '. $post->title .'!'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit($id)
  {
    return View::make('blog::Admin/Post/Form', [
      'post' => $this->post->getById($id),
      'categories' => $this->category->getSelectArray()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @return Response
   */
  public function update(UpdateRequest $request)
  {
    $post = $this->post->update($request->route->parameter('post'), $request->all());

    return Redirect::route('control.post.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully updated '. $request->title .'!'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return Response
   */
  public function destroy($id)
  {
    dd('Remove the specified resource from storage.');
  }

}