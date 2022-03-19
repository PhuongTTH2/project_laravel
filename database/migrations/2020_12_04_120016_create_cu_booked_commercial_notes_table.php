<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuBookedCommercialNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cu_booked_commercial_notes', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`cu_booked_commercial_notes` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `cu_booked_commercial_id` BIGINT NOT NULL,
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
                  INDEX `fk_cu_booked_commercial_notes_cu_booked_commercials1_idx` (`cu_booked_commercial_id` ASC),
                  CONSTRAINT `fk_cu_booked_commercial_notes_cu_booked_commercials1`
                    FOREIGN KEY (`cu_booked_commercial_id`)
                    REFERENCES `ass`.`cu_booked_commercials` (`id`)
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
        Schema::dropIfExists('cu_booked_commercial_notes');
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=1;');
    }
}
