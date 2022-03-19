<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableFutureProgramsIndex002 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = 'ALTER TABLE `future_programs` ADD INDEX index_future_programs_002(`callsign`, `day_of_week_id`, `start_time` , `year`, `month`);';
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = 'ALTER TABLE `future_programs` DROP INDEX index_future_programs_002';
        DB::connection()->getPdo()->exec($sql);
    }
}
