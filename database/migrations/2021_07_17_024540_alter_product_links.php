<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_links', function (Blueprint $table) {
            $table->dropForeign('product_links_department_id_foreign');
            $table->dropColumn('department_id');
            $table->dropForeign('product_links_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_links', function (Blueprint $table) {
            //
        });
    }
}
