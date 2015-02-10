<?php namespace SimpleCms\Faq;

use SimpleCms\Core\BaseModel;

class Faq extends BaseModel {

  protected $fillable = [];

  public function category()
  {
    return $this->belongsTo('SimpleCms\Blog\Category\Category');
  }

}