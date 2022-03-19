<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFutureProgramsAddReleaseTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('future_programs', function (Blueprint $table) {
            $table->datetime('release_time')
                ->default('1000-01-01 00:00:00')
                ->after('program_code');
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
        Schema::table('future_programs', function (Blueprint $table) {
            $table->dropColumn('release_time');
        });
    }
}
