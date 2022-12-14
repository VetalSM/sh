<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('tel')->nullable();
            $table->text('credentials')->nullable();
            $table->text('address')->nullable();
            $table->text('comment')->nullable();
            $table->text('product')->nullable();
            $table->text('product_id')->nullable();
            $table->text('price')->nullable();
            $table->text('currency')->nullable();
            $table->text('weight')->nullable();
            $table->text('unit')->nullable();
            $table->text('quantity')->nullable();
            $table->text('product_total')->nullable();
            $table->text('total')->nullable();
            $table->text('created')->nullable();
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
        Schema::dropIfExists('orders');

    }
}
