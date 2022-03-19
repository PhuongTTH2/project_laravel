<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCartsCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('sponsor_product_category');
            $table->char('business_category_code', 2)->after('user_sponsor_id');
            $table->char('product_category_code', 5)->after('business_category_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('business_category_code');
            $table->dropColumn('product_category_code');
            $table->string('sponsor_product_category', 64)->after('user_sponsor_id');
        });
    }
}
