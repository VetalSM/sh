<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExpenseRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_rates', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->decimal('cost', 8, 2); // Себестоимость
            $table->decimal('packaging', 8, 2); // Упаковка
            $table->decimal('expenses', 8, 2); // Расходы
            $table->decimal('admin_expenses', 8, 2); // Админ. расходы
            $table->decimal('other_expenses', 8, 2); // Другие расходы
            $table->decimal('tax', 8, 2); // Налог
            $table->decimal('travel', 8, 2); // Дорога
            $table->decimal('advertising', 8, 2); // Реклама
            $table->decimal('profit', 8, 2); // Прибыль
            $table->string('price_name');
            $table->integer('weight');
            $table->integer('category_id');
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
        Schema::dropIfExists('expense_rates');
    }
}
