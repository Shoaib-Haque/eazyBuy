<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->string('id', 11)->unique()->primary();
            //$table->timestamps();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('email', 250)->unique();
            $table->text('image');
            $table->char('password', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_profiles');
    }
}
