<?php
//
//use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//
//class PackagePricesTable extends Migration
//{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('package_prices', function (Blueprint $table) {
//            $table->id();
//            $table->text('weight')->nullable();
//            $table->text('bottle')->nullable();
//            $table->text('sticker')->nullable();
//            $table->text('package')->nullable();
//            $table->timestamps();
//
//        });
//    }
//
//
//    /**
//     * Reverse the migrations.
//     *
//     * @return void
//     */
//    public function down()
//    {
//        Schema::dropIfExists('package_prices');
//    }
//}
