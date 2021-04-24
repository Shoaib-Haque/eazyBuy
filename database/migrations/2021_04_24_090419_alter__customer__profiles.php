<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\Type;

class AlterCustomerProfiles extends Migration
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
        Schema::table('customer_profiles', function (Blueprint $table) {
            $table->char('password', 60)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_profiles', function (Blueprint $table) {
            //
        });
    }
}
