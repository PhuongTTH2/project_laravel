<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTable60minTargetsAddDataType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('60_min_targets', function (Blueprint $table) {
            $table->integer('data_type_id')->after('id');
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
        Schema::table('60_min_targets', function (Blueprint $table) {
            $table->dropColumn('data_type_id');
        });
    }
}
