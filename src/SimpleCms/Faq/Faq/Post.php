<?php namespace SimpleCms\Blog\Post;

use SimpleCms\Core\BaseModel;

class Post extends BaseModel {

  protected $fillable = [
    'category_id',
    'author_id',
    'status',
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