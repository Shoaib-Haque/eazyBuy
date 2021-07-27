<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCombinationInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('combination_inventory', function (Blueprint $table) {
            $table->float('unit_buying_price', 8, 2);
            $table->float('unit_selling_price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('combination_inventory', function (Blueprint $table) {
            //
        });
    }
}
