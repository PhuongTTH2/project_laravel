<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('broadcasters', function(Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`broadcasters` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `area_id` BIGINT NOT NULL,
                  `callsign` CHAR(4) NOT NULL,
                  `broadcaster_name` VARCHAR(32) NOT NULL,
                  `order_num` INT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `created_by` BIGINT(20) NULL,
                  `updated_at` DATETIME NOT NULL,
                  `updated_by` BIGINT(20) NULL,
                  `deleted_at` DATETIME NULL,
                  `deleted_by` BIGINT(20) NULL,
                  PRIMARY KEY (`id`),
                  INDEX `fk_broadcasters_areas1_idx` (`area_id` ASC),
                  UNIQUE INDEX `callsign_UNIQUE` (`callsign` ASC),
                  CONSTRAINT `fk_broadcasters_areas1`
                    FOREIGN KEY (`area_id`)
                    REFERENCES `ass`.`areas` (`id`)
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
        Schema::dropIfExists('broadcasters');
    }
}
