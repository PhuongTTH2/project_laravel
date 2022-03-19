<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCartsAddRatingsData extends Migration
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
            $table->integer('data_type_id')->nullable()->after('product_category_code');
            $table->tinyInteger('rate_type_id_1')->nullable()->after('data_type_id');
            $table->tinyInteger('rate_type_id_2')->nullable()->after('rate_type_id_1');
            $table->integer('aggregate_type_id')->nullable()->after('rate_type_id_2');
            $table->string('target_group_code', 32)->nullable()->after('aggregate_type_id');
            $table->string('target_code', 32)->nullable()->after('target_group_code');
            $table->integer('period_type_id')->nullable()->after('target_code');
            $table->date('period_from_date')->nullable()->after('period_type_id');
            $table->date('period_to_date')->nullable()->after('period_from_date');
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
            $table->dropColumn('data_type_id');
            $table->dropColumn('rate_type_id_1');
            $table->dropColumn('rate_type_id_2');
            $table->dropColumn('aggregate_type_id');
            $table->dropColumn('target_group_code');
            $table->dropColumn('target_code');
            $table->dropColumn('period_type_id');
            $table->dropColumn('period_from_date');
            $table->dropColumn('period_to_date');
        });
    }
}
