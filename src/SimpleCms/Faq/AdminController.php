<?php namespace SimpleCms\Faq;

use SimpleCms\Core\BaseController;
use SimpleCms\Faq\Category\RepositoryInterface as CategoryRepositoryInterface;
use View;
use Redirect;

class AdminController extends BaseController {

  /**
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

    $this->faq = $faq;
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return View::make('faq::Admin/Faq/Index', [
      'models' => $this->faq->all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('faq::Admin/Faq/Form', []);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CreateRequest $request)
  {
    $faq = $this->faq->store($request->all());

    return Redirect::route('control.faq.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully created '. $faq->title .'!'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit($id)
  {
    return View::make('faq::Admin/Faq/Form', [
      'model' => $this->faq->getById($id)
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @return Response
   */
  public function update(UpdateRequest $request)
  {
    $faq = $this->faq->update($request->{config('faq.faqURL')}, $request->all());

    return Redirect::route('control.faq.index')->with([
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