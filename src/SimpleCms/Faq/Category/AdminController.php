<?php namespace SimpleCms\Blog\Category;

use SimpleCms\Core\BaseController;
use View;
use Redirect;

class AdminController extends BaseController {

  /**
   * Store our RepositoryInterface implementation.
   *
   * @var Simple\Blog\Category\RepositoryInterface
   */
  protected $category;

  /**
   * Set up the class
   *
   * @param Simple\Blog\Category\RepositoryInterface $category
   *
   * @return void
   */
  public function __construct(RepositoryInterface $category)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->category = $category;
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return View::make('blog::Admin/Category/Index', [
      'categories' => $this->category->all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('blog::Admin/Category/Form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CreateRequest $request)
  {
    $category = $this->category->store($request->all());

    return Redirect::route('control.category.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully created '. $category->title .'!'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit($id)
  {
    return View::make('blog::Admin/Category/Form', [
      'category' => $this->category->getById($id),
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
    $category = $this->category->update($request->route->parameter('category'), $request->all());

    return Redirect::route('control.category.index')->with([
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