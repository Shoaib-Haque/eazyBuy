<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_id', 11);
            $table->foreign('customer_id')->references('id')->on('customer_profiles');
            $table->string('city', 100);
            $table->string('area', 100);
            $table->string('road', 50)->nullable();
            $table->string('house', 100)->nullable();
            $table->string('details', 200)->nullable();
            $table->string('contact', 11)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
}
