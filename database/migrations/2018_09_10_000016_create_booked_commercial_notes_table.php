<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookedCommercialNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booked_commercial_notes', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`booked_commercial_notes` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `booked_commercial_id` BIGINT NOT NULL,
                  `status` INT NOT NULL,
                  `note` TEXT NULL,
                  `commented_user_id` BIGINT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_booking_comments_booked_commercials1_idx` (`booked_commercial_id` ASC),
                  CONSTRAINT `fk_booking_comments_booked_commercials1`
                    FOREIGN KEY (`booked_commercial_id`)
                    REFERENCES `ass`.`booked_commercials` (`id`)
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
        Schema::dropIfExists('booked_commercial_notes');
    }
}
