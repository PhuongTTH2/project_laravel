<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBroadcasterCuEnteriesEffectiveDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('broadcaster_cu_enteries', function (Blueprint $table) {
            $table->datetime('effective_date')->nullable()->after('broadcaster_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('broadcaster_cu_enteries', function (Blueprint $table) {
            $table->dropColumn('effective_date');
        });
    }
}
