<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuBookedCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cu_booked_commercials', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`cu_booked_commercials` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `booking_id` BIGINT NOT NULL,
                  `cu_commercial_id` BIGINT NOT NULL,
                  `program_title` VARCHAR(64) NOT NULL,
                  `price` DOUBLE(20,1) NOT NULL,
                  `imp` DOUBLE(9,1) NOT NULL,
                  `cpm` INT NOT NULL,
                  `length` VARCHAR(32) NOT NULL,
                  `device` VARCHAR(32) NOT NULL,
                  `os` VARCHAR(32) NOT NULL,
                  `clickable` VARCHAR(32) NOT NULL,
                  `term_start` DATETIME NOT NULL,
                  `term_end` DATETIME NOT NULL,
                  `status` INT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_cu_booked_commercials_cu_commercials1_idx` (`cu_commercial_id` ASC),
                  INDEX `fk_cu_booked_commercials_bookings1_idx` (`booking_id` ASC),
                  CONSTRAINT `fk_cu_booked_commercials_cu_commercials1`
                    FOREIGN KEY (`cu_commercial_id`)
                    REFERENCES `ass`.`cu_commercials` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                  CONSTRAINT `fk_cu_booked_commercials_bookings1`
                    FOREIGN KEY (`booking_id`)
                    REFERENCES `ass`.`bookings` (`id`)
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
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('cu_booked_commercials');
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=1;');
    }
}
