<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`ratings` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `key_hash_code` TEXT NOT NULL,
                  `data_type_id` INT NOT NULL,
                  `rate_type_id` INT NOT NULL,
                  `aggregate_type_id` INT NOT NULL,
                  `period_type_id` INT NOT NULL,
                  `area_code` CHAR(7) NOT NULL,
                  `callsign` CHAR(4) NOT NULL,
                  `channel` CHAR(6) NOT NULL,
                  `period_from_date` DATE NOT NULL,
                  `period_from_vol` INT NOT NULL,
                  `period_to_date` DATE NOT NULL,
                  `period_to_vol` INT NOT NULL,
                  `spot_vol` INT NOT NULL,
                  `target_code` VARCHAR(32) NOT NULL,
                  `sample_num` INT NOT NULL,
                  `onair_date` DATE NOT NULL,
                  `day_of_week_id` INT NOT NULL,
                  `start_position` CHAR(4) NOT NULL,
                  `end_position` CHAR(4) NOT NULL,
                  `pt_sb_code` CHAR(2) NOT NULL,
                  `rate` DOUBLE NOT NULL,
                  `release_time` DATETIME NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`))
                ENGINE = InnoDB;
            ';
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
