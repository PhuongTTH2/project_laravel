<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commercials', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`commercials` (
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
                  `is_deleted` TINYINT(1) NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_commercials_broadcasters1_idx` (`broadcaster_id` ASC),
                  UNIQUE INDEX `hash_code_UNIQUE` (`key_hash_unique_code`(768) ASC),
                  CONSTRAINT `fk_commercials_broadcasters1`
                    FOREIGN KEY (`broadcaster_id`)
                    REFERENCES `ass`.`broadcasters` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION)
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
        Schema::dropIfExists('commercials');
    }
}
