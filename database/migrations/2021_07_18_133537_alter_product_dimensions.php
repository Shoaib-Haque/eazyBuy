<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductDimensions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_dimensions', function (Blueprint $table) {
            $table->float('length')->unsigned()->nullable()->change();
            $table->float('width')->unsigned()->nullable()->change();
            $table->float('height')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_dimensions', function (Blueprint $table) {
            //
        });
    }
}
