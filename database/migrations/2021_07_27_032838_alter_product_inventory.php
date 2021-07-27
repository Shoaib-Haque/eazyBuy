<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_inventory', function (Blueprint $table) {
            $table->renameColumn('unit_price', 'unit_buying_price');
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
        Schema::table('product_inventory', function (Blueprint $table) {
            $table->renameColumn('unit_buying_price', 'unit_price');
        });
    }
}
