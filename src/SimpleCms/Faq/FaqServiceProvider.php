<?php namespace SimpleCms\Faq;

use Illuminate\Support\ServiceProvider;
use SimpleCms\Faq\Faq\Faq;
use SimpleCms\Faq\Category\Category;

class FaqServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    $this->package('simple-cms/faq');

    require __DIR__.'/../../routes.php';
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('\SimpleCms\Faq\Faw\RepositoryInterface', function($app)
    {
      return new \SimpleCms\Blog\Post\EloquentRepository(new Post);
    });
    $this->app->bind('\SimpleCms\Blog\Category\RepositoryInterface', function($app)
    {
      return new \SimpleCms\Blog\Category\EloquentRepository(new Category);
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [];
  }

}
