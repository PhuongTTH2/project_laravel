<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCuCommercialOsAddIsUse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cu_commercial_os', function (Blueprint $table) {
            $table->boolean('is_use')->default(1)->after('is_default');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cu_commercial_os', function (Blueprint $table) {
            $table->dropColumn('is_use');
        });
    }
}
