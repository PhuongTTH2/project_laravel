<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJustBefore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $sql = "
        CREATE TABLE IF NOT EXISTS `just_before_ratings` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `key_hash_code` TEXT NOT NULL,
            `data_type_id` INT(11) NOT NULL,
            `rate_type_id` INT(11) NOT NULL,
            `aggregate_type_id` INT(11) NOT NULL,
            `period_type_id` INT(11) NOT NULL,
            `vr_area_code` CHAR(2) NOT NULL,
            `callsign` CHAR(4) NOT NULL,
            `channel` CHAR(6) NOT NULL,
            `period_from_date` DATE NOT NULL,
            `period_from_vol` INT(11) NOT NULL,
            `period_to_date` DATE NOT NULL,
            `period_to_vol` INT(11) NOT NULL,
            `spot_vol` INT(11) NOT NULL,
            `target_code` VARCHAR(32) NOT NULL,
            `sample_num` INT(11) NOT NULL,
            `onair_date` DATE NOT NULL,
            `day_of_week_id` INT(11) NOT NULL,
            `start_position` CHAR(4) NOT NULL,
            `end_position` CHAR(4) NOT NULL,
            `pt_sb_code` CHAR(2) NOT NULL,
            `rate` DOUBLE NOT NULL,
            `int_rate` INT(11) NOT NULL DEFAULT '0',
            `release_time` DATETIME NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            `deleted_at` DATETIME NULL,
            `created_by` BIGINT NULL,
            `updated_by` BIGINT NULL,
            `deleted_by` BIGINT NULL,
            PRIMARY KEY (`id`),
            INDEX `index_just_before_ratings_002` (`data_type_id`, `aggregate_type_id`, `target_code`, `period_type_id`, `period_from_date`, `period_to_date`),
            INDEX `index_just_before_ratings_001` (`key_hash_code`(255), `data_type_id`, `rate_type_id`, `aggregate_type_id`, `target_code`, `period_from_date`, `period_to_date`)
        )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        DB::connection()->getPdo()->exec($sql);

        $sql = "
        CREATE TABLE IF NOT EXISTS `just_before_rating_targets` (
            `id` BIGINT NOT NULL AUTO_INCREMENT,
            `year` CHAR(4) NOT NULL,
            `month` CHAR(2) NOT NULL,
            `data_type_id` INT(11) NOT NULL,
            `vr_area_code` CHAR(2) NOT NULL,
            `callsign` CHAR(4) NOT NULL,
            `target_code` VARCHAR(32) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            `deleted_at` DATETIME NULL,
            `created_by` BIGINT NULL,
            `updated_by` BIGINT NULL,
            `deleted_by` BIGINT NULL,
            PRIMARY KEY (`id`),
            INDEX `index_rating_targets_001` (`data_type_id`, `vr_area_code`, `year`, `month`, `callsign`)
        )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        DB::connection()->getPdo()->exec($sql);

        $sql = "
        CREATE TABLE IF NOT EXISTS `just_before_target_periods` (
            `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
            `commercial_year_month` CHAR(6) NOT NULL,
            `vr_area_code` CHAR(2) NOT NULL,
            `broadcaster_code` INT(11) NOT NULL,
            `data_type_id` INT(11) NOT NULL,
            `period_type_id` INT(11) NOT NULL,
            `aggregate_type_id` INT(11) NOT NULL,
            `period_from_date` DATE NOT NULL,
            `period_from_vol` INT(11) NOT NULL,
            `period_to_date` DATE NOT NULL,
            `period_to_vol` INT(11) NOT NULL,
            `spot_vol` INT(11) NULL DEFAULT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            `deleted_at` DATETIME NULL DEFAULT NULL,
            `created_by` BIGINT(20) NULL DEFAULT NULL,
            `updated_by` BIGINT(20) NULL DEFAULT NULL,
            `deleted_by` BIGINT(20) NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            INDEX `index_just_before_target_periods_001` (`commercial_year_month`, `vr_area_code`, `broadcaster_code`, `data_type_id`, `period_type_id`, `aggregate_type_id`),
            INDEX `index_just_before_target_periods_002` (`period_from_date`, `period_from_vol`, `period_to_date`, `period_to_vol`)
        )ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
        ";

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
        Schema::dropIfExists('just_before_ratings');
        Schema::dropIfExists('just_before_rating_targets');
        Schema::dropIfExists('just_before_target_periods');
    }
}
