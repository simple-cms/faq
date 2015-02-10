<?php

Route::resource(config('faq.faqURL'), 'SimpleCms\Faq\PublicController', ['only' => ['index','show']]);

Route::group(['prefix' => config('core.adminURL')], function()
{
  Route::resource(config('faq.faqURL'), 'SimpleCms\Faq\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
});