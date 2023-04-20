<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->string('price_start_name')->nullable();
            $table->string('price_end_name')->nullable();
            $table->integer('status_start')->nullable();
            $table->integer('status_end')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('work_start')->nullable();
            $table->string('work_end')->nullable();
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
        Schema::dropIfExists('status_jobs');
    }
}
