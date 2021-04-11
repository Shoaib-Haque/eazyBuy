<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            //$table->timestamps();
            $table->string('type', 100);
            $table->text('description');
            $table->string('product_id', 15);
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('available_size_id')->unsigned()->nullable();
            $table->foreign('available_size_id')->references('id')->on('available_sizes');
            $table->integer('available_color_id')->unsigned()->nullable();
            $table->foreign('available_color_id')->references('id')->on('available_colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
