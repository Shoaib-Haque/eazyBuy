<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\Type;

class CreateCustomerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Type::hasType('char')) {
            Type::addType('char', StringType::class);
        }
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->increments('id');
            //$table->timestamps();
            $table->string('name', 50);
            $table->string('email', 250)->unique();
            $table->char('password', 60);
        });

        \DB::statement('ALTER TABLE customer_profiles AUTO_INCREMENT = 100001;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_profiles');
    }
}
