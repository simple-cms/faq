<?php namespace SimpleCms\Faq;

use SimpleCms\Core\BaseModel;

class Faq extends BaseModel {

  protected $fillable = [
    'category_id',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

  public function category()
  {
    return $this->belongsTo('SimpleCms\Blog\Category\Category');
  }

}