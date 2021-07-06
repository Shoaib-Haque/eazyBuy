<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinationInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combination_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('combination_id')->unsigned();
            $table->foreign('combination_id')->references('id')->on('combinations');
            $table->string('SKU', 20);
            $table->smallInteger('stock_quantity');
            $table->string('operator', 1);
            $table->float('amount', 6, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combination_inventory');
    }
}
