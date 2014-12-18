<?php namespace SimpleCms\Blog\Category;

use SimpleCms\Core\BaseModel;

class Category extends BaseModel {

  protected $fillable = [
    'status',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

  public function categories()
  {
    return $this->hasMany('SimpleCms\Blog\Post\Post');
  }

}