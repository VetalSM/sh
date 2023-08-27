<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->string('ifra_certificate')->nullable();
            $table->string('certificate')->nullable();
            $table->string('safety')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->integer('status')->default(1);
            $table->integer('views')->nullable();
            $table->text('prices');
            $table->text('prom_prices');
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_title')->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->string('title_ru')->nullable();
            $table->text('excerpt_ru')->nullable();
            $table->text('body_ru')->nullable();
            $table->text('meta_keywords_ru')->nullable();
            $table->text('meta_description_ru')->nullable();
            $table->text('meta_title_ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
