<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRatingsAddIntRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ratings', function (Blueprint $table) {
            $table->integer('int_rate')->default(0)->after('rate');
        });

        $sql = 'UPDATE ratings SET int_rate = rate * 10000';
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropColumn('int_rate');
        });
    }
}
