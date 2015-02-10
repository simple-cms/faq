<?php namespace SimpleCms\Faq;

use Illuminate\Support\ServiceProvider;

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
    // Register our package views
    $this->loadViewsFrom(__DIR__.'/../../views', 'faq');

    // Register our package translation files
    $this->loadTranslationsFrom(__DIR__.'/../../lang', 'faq');

    // Register the files our package should publish
    $this->publishes([
      // Publish our views
      __DIR__.'/../../views' => base_path('resources/views/vendor/faq'),
      // Publish our config
      __DIR__.'/../../config/faq.php' => config_path('faq.php'),
    ]);

    require_once __DIR__ .'/../../routes.php';
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('\SimpleCms\Faq\RepositoryInterface', function($app)
    {
      return new \SimpleCms\Faq\EloquentRepository(new Faq);
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
