<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBroadcasterAddDefaultTarget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('broadcasters', function (Blueprint $table) {
            $table->integer('default_data_type_id')->nullable()->after('order_num');
            $table->string('default_target_group_code', 32)->nullable()->after('default_data_type_id');
            $table->string('default_target_code', 32)->nullable()->after('default_target_group_code');
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
        Schema::table('broadcasters', function (Blueprint $table) {
            $table->dropColumn('default_data_type_id');
            $table->dropColumn('default_target_group_code');
            $table->dropColumn('default_target_code');
        });
    }
}
