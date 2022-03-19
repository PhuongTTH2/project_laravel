<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddDataLicensesCanUse60min extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('data_licenses', function (Blueprint $table) {
            $table->tinyInteger('can_use_60min')->default(0)->after('effective_date');
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
        Schema::table('data_licenses', function (Blueprint $table) {
            $table->dropColumn('can_use_60min');
        });
    }
}
