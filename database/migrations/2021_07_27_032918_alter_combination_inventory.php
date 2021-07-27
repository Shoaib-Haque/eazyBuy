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
            $table->renameColumn('operator', 'buying_operator');
            $table->renameColumn('amount', 'buying_amount');
            $table->string('selling_operator', 1);
            $table->float('selling_amount', 6, 2);
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
            $table->renameColumn('buying_operator', 'operator');
            $table->renameColumn('buying_amount', 'amount');
        });
    }
}
