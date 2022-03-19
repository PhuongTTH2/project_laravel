<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVrPopulations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('vr_populations', function (Blueprint $table) {
            $sql = '
                CREATE TABLE IF NOT EXISTS `ass`.`vr_populations` (
                  `id` BIGINT NOT NULL AUTO_INCREMENT,
                  `vr_area_code` CHAR(2) NOT NULL,
                  `period_from_date` DATE NOT NULL,
                  `period_to_date` DATE NOT NULL,
                  `target_code` VARCHAR(32) NOT NULL,
                  `population` INT NOT NULL,
                  `created_at` DATETIME NOT NULL,
                  `updated_at` DATETIME NOT NULL,
                  `deleted_at` DATETIME NULL,
                  `created_by` BIGINT NULL,
                  `updated_by` BIGINT NULL,
                  `deleted_by` BIGINT NULL,
                  PRIMARY KEY (`id`))
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
        Schema::dropIfExists('vr_populations');
    }
}
