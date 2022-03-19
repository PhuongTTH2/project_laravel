<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuAvailableBroadcastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('cu_available_broadcasters');
        Schema::table('cu_available_broadcasters', function(Blueprint $table) {
            $sql = '
            CREATE TABLE IF NOT EXISTS `ass`.`cu_available_broadcasters` (
              `id` BIGINT NOT NULL AUTO_INCREMENT,
              `license_id` BIGINT NOT NULL,
              `broadcaster_id` BIGINT NOT NULL,
              `permission_id` int(11) NOT NULL DEFAULT 2,
              `edited_user` TINYINT(1) NOT NULL DEFAULT 0,
              `created_at` DATETIME NOT NULL,
              `updated_at` DATETIME NOT NULL,
              `deleted_at` DATETIME NULL,
              `created_by` BIGINT NULL,
              `updated_by` BIGINT NULL,
              `deleted_by` BIGINT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_cu_available_broadcasters_licenses1_idx` (`license_id` ASC),
              CONSTRAINT `fk_cu_available_broadcasters_data_licenses1`
                FOREIGN KEY (`license_id`)
                REFERENCES `ass`.`licenses` (`id`)
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
        Schema::dropIfExists('cu_available_broadcasters');
    }
}
