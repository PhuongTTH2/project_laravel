<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateAvailableBroadcastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('available_broadcasters');
        Schema::table('available_broadcasters', function(Blueprint $table) {
            $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`available_broadcasters` (
              `id` BIGINT NOT NULL AUTO_INCREMENT,
              `data_license_id` BIGINT NOT NULL,
              `broadcaster_id` BIGINT NOT NULL,
              `created_at` DATETIME NOT NULL,
              `updated_at` DATETIME NOT NULL,
              `deleted_at` DATETIME NULL,
              `created_by` BIGINT NULL,
              `updated_by` BIGINT NULL,
              `deleted_by` BIGINT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_available_broadcasters_data_licenses1_idx` (`data_license_id` ASC),
              CONSTRAINT `fk_available_broadcasters_data_licenses1`
                FOREIGN KEY (`data_license_id`)
                REFERENCES `ass`.`data_licenses` (`id`)
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
        //
        Schema::dropIfExists('available_broadcasters');
    }
}
