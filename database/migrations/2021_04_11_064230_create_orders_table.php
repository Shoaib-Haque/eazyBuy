<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->start_from(600001);;
            $table->string('customer_id', 11);
            $table->foreign('customer_id')->references('id')->on('customer_profiles');
            $table->date('date_stamp');
            $table->string('status', 50);
            $table->integer('shipping_method_id')->unsigned();
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
            $table->integer('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
