<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcasterCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('broadcaster_commercials', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`broadcaster_commercials` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `key_hash_code` TEXT NOT NULL,
                  `key_hash_unique_code` TEXT NOT NULL,
                  `broadcaster_id` BIGINT NOT NULL,
                  `year` CHAR(4) NOT NULL,
                  `month` CHAR(2) NOT NULL,
                  `area_code` CHAR(7) NOT NULL,
                  `callsign` CHAR(4) NOT NULL,
                  `channel` CHAR(6) NOT NULL,
                  `onair_date` DATE NOT NULL,
                  `day_of_week_id` INT NOT NULL,
                  `position` CHAR(4) NOT NULL,
                  `pt_sb_code` CHAR(2) NOT NULL,
                  `start_position` CHAR(4) NOT NULL,
                  `end_position` CHAR(4) NULL,
                  `unit_seq` INT NOT NULL,
                  `price` INT NOT NULL,
                  `program_start_time` CHAR(4) NOT NULL,
                  `detail_position` CHAR(4) NULL,
                  `position_key` VARCHAR(16) NULL,
                  `sales_start_time` DATETIME NOT NULL,
                  `sales_end_time` DATETIME NOT NULL,
                  `cancel_limit_time` DATETIME NOT NULL,
                  `reserve_cm` CHAR(2) NULL,
                  `program_title` VARCHAR(64) NULL,
                  `program_genre` VARCHAR(64) NULL,
                  `program_cast` VARCHAR(128) NULL,
                  `program_memo` VARCHAR(128) NULL,
                  `program_note_1` VARCHAR(128) NULL,
                  `program_note_2` VARCHAR(128) NULL,
                  `has_moved` CHAR(2) NULL,
                  `actual_start_time` DATETIME NULL,
                  `actual_end_time` DATETIME NULL,
                  `actual_onair_start_time` DATETIME NULL,
                  `actual_onair_end_time` DATETIME NULL,
                  `length` SMALLINT NOT NULL DEFAULT 15,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_broadcaster_commercials_broadcasters1_idx` (`broadcaster_id` ASC),
                  UNIQUE INDEX `hash_code_UNIQUE` (`key_hash_unique_code`(255) ASC),
                  CONSTRAINT `fk_broadcaster_commercials_broadcasters1`
                    FOREIGN KEY (`broadcaster_id`)
                    REFERENCES `ass`.`broadcasters` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB
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
        Schema::dropIfExists('broadcaster_commercials');
    }
}
