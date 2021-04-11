<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_colors', function (Blueprint $table) {
            $table->increments('id')->start_from(8001);
            //$table->timestamps();
            $table->string('product_id', 15);
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('available_colors');
    }
}
