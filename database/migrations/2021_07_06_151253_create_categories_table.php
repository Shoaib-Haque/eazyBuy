<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            //$table->timestamps();
            $table->string('title', 100);
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
        });

        \DB::statement('ALTER TABLE categories AUTO_INCREMENT = 201;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
