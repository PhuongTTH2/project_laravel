<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookedCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booked_commercials', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`booked_commercials` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `booking_id` BIGINT NOT NULL,
                  `commercial_id` BIGINT NOT NULL,
                  `onair_date` DATE NOT NULL,
                  `day_of_week_id` INT NOT NULL,
                  `start_position` CHAR(4) NOT NULL,
                  `end_position` CHAR(4) NOT NULL,
                  `pt_sb_code` CHAR(2) NOT NULL,
                  `program_title` TEXT NULL,
                  `price` INT NOT NULL,
                  `status` INT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_booked_commercials_commercials1_idx` (`commercial_id` ASC),
                  INDEX `fk_booked_commercials_bookings1_idx` (`booking_id` ASC),
                  CONSTRAINT `fk_booked_commercials_commercials1`
                    FOREIGN KEY (`commercial_id`)
                    REFERENCES `ass`.`commercials` (`id`)
                    ON DELETE NO ACTION
                    ON UPDATE NO ACTION,
                  CONSTRAINT `fk_booked_commercials_bookings1`
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
        Schema::dropIfExists('booked_commercials');
    }
}
