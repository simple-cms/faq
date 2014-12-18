<?php

use Illuminate\Database\Migrations\Migration;

class CreateFaqCategoriesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('faq_categories', function($table)
    {
      $table->increments('id');
      $table->string('title', 100);
      $table->string('excerpt', 250);
      $table->string('meta_title', 70);
      $table->string('meta_description', 155);
      $table->string('slug', 80)->unique();
      $table->text('content');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('faq_categories');
  }

}