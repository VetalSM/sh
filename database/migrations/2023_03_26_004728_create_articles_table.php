<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

  {
      Schema::create('articles', function (Blueprint $table) {
          $table->id();
          $table->string('user_id');
          $table->foreignId('category_id');
          $table->string('slug')->unique();
          $table->string('title');
          $table->string('thumbnail')->nullable();
          $table->text('body');
          $table->text('excerpt')->nullable();
          $table->integer('status')->default(8);
          $table->integer('views')->nullable();
          $table->text('meta_keywords')->nullable();
          $table->text('meta_description')->nullable();
          $table->text('meta_title')->nullable();
          $table->string('title_ru')->nullable();
          $table->text('body_ru')->nullable();
          $table->text('excerpt_ru')->nullable();
          $table->text('meta_keywords_ru')->nullable();
          $table->text('meta_description_ru')->nullable();
          $table->text('meta_title_ru')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
