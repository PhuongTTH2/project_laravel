<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDataLicenseDetailsModifyNotNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_license_details', function (Blueprint $table) {
            $table->integer('data_type_id')->nullable()->change();
            $table->integer('rate_type_id')->nullable()->change();
            $table->date('period_from_date')->nullable()->change();
            $table->date('period_to_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
