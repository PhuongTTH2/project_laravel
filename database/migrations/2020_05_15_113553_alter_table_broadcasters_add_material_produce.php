<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBroadcastersAddMaterialProduce extends Migration
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
            $table->tinyInteger('material_produce')->default('0')->after('default_target_code');
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
            $table->dropColumn('material_produce');
        });
    }
}
