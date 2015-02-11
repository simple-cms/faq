<?php namespace SimpleCms\Faq;

use SimpleCms\Faq\RepositoryInterface;
use SimpleCms\Core\BaseController;

class PublicController extends BaseController {

  /**
   * Store our RepositoryInterface implementation.
   *
   * @var Simple\Faq\RepositoryInterface
   */
  protected $faq;

  /**
   * Set up the class
   *
   * @param Simple\Faq\RepositoryInterface $faq
   *
   * @return void
   */
  public function __construct(RepositoryInterface $faq)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->faq = $faq;
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('faq::Public.Index', [
      'metaTitle' => 'Home page title',
      'metaDesciption' => 'Home page description',
      'models' => $this->faq->paginate()
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function show($slug)
  {
    return view('faq::Public.Show', [
      'metaTitle' => 'slug page title',
      'metaDesciption' => 'slug page description',
      'model' => $this->faq->getFirstBy('slug', $slug)
    ]);
  }

}