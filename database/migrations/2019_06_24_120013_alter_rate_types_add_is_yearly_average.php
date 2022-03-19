<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRateTypesAddIsYearlyAverage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rate_types', function (Blueprint $table) {
            $table->boolean('is_yearly_average')->nullable()->default(true)->after('scale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rate_types', function (Blueprint $table) {
            $table->dropColumn("is_yearly_average");
        });
    }
}
