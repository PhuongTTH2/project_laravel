<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAss1720 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec(
            "ALTER TABLE `future_programs`
            	CHANGE COLUMN `callsign` `callsign` CHAR(4) NOT NULL COLLATE 'utf8mb4_general_ci' AFTER `id`,
            	CHANGE COLUMN `year` `year` CHAR(4) NOT NULL COLLATE 'utf8mb4_general_ci' AFTER `callsign`,
            	CHANGE COLUMN `month` `month` CHAR(2) NOT NULL COLLATE 'utf8mb4_general_ci' AFTER `year`,
            	CHANGE COLUMN `start_time` `start_time` CHAR(4) NOT NULL COLLATE 'utf8mb4_general_ci' AFTER `day_of_week_id`,
            	CHANGE COLUMN `main_title` `main_title` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci' AFTER `duration`,
            	CHANGE COLUMN `program_code` `program_code` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci' AFTER `main_title`");

        DB::connection()->getPdo()->exec("ALTER TABLE future_programs ADD INDEX index_future_programs_001(year, month, callsign, day_of_week_id, start_time)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec("
            ALTER TABLE `future_programs`
            	CHANGE COLUMN `callsign` `callsign` CHAR(4) NOT NULL COLLATE 'utf8mb4_unicode_ci' AFTER `id`,
            	CHANGE COLUMN `year` `year` CHAR(4) NOT NULL COLLATE 'utf8mb4_unicode_ci' AFTER `callsign`,
            	CHANGE COLUMN `month` `month` CHAR(2) NOT NULL COLLATE 'utf8mb4_unicode_ci' AFTER `year`,
            	CHANGE COLUMN `start_time` `start_time` CHAR(4) NOT NULL COLLATE 'utf8mb4_unicode_ci' AFTER `day_of_week_id`,
            	CHANGE COLUMN `main_title` `main_title` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci' AFTER `duration`,
            	CHANGE COLUMN `program_code` `program_code` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci' AFTER `main_title`");

        DB::connection()->getPdo()->exec("ALTER TABLE `future_programs` DROP INDEX `index_future_programs_001`");

    }
}
